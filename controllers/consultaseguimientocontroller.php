<?php

require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/planEstudiosDTO.php';
require_once '../../model/DAO/grupoDAO.php';
require_once '../../model/DTO/grupoDTO.php';
require_once '../../model/DAO/asignaturaDAO.php';
require_once '../../model/DTO/asignaturaDTO.php';
require_once '../../model/DAO/unidadDAO.php';
require_once '../../model/DTO/unidadDTO.php';
require_once '../../model/DAO/pruebaDAO.php';
require_once '../../model/DTO/pruebaDTO.php';
require_once '../../model/DAO/estudianteDAO.php';
require_once '../../model/DTO/estudianteDTO.php';
require_once '../../model/DAO/temaDAO.php';
require_once '../../model/DTO/temaDTO.php';
require_once '../../model/DTO/matriculaDTO.php';
require_once '../../model/DAO/facultadDAO.php';
require_once '../../model/DTO/facultadDTO.php';
require_once '../../model/DAO/departamentoDAO.php';
require_once '../../model/DTO/departamentoDTO.php';
require_once '../../model/DAO/docenteDAO.php';
require_once '../../model/DTO/docenteDTO.php';
require_once '../../model/DAO/personaDAO.php';
require_once '../../model/DTO/personaDTO.php';

require_once '../../model/DAO/programaDAO.php';
require_once '../../model/DTO/programaDTO.php';
require_once '../../model/DAO/planestudioDAO.php';
require_once '../../model/DTO/planEstudiosDTO.php';


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of consultaControlller
 *
 * @author jerson
 */
class consultaController {
    /*
     * 
     */

    public function listarPlanEstudios() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM plandeestudios');
        $consulta->execute();
        $ces = null;
        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $astraba = array();

        foreach ($tabla_datos as $con => $valor) {

            $ces = new planEstudiosDTO();
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setCodigo($tabla_datos[$con]["codigo"]);
            $var = $this->listarmaterias($tabla_datos[$con]["nombre"]);
            $arr = array("pro" => $ces, "mat" => $var);
            array_push($astraba, $arr);
        }
        return $astraba;
    }

    /*
     * 
     */

    public function listarmaterias($fac) {

        $conexion = new Conexion();
        $consulta = $conexion->prepare("SELECT A.codigo , A.nombre ,A.semestre ,G.grupo , "
                . "P.nombre , G.grupo_numero FROM asignatura A , grupo G ,docente D , persona P "
                . "WHERE A.nombre_plandeestudios = :pde AND "
                . "G.codigo_asignatura = A.codigo AND G.grupo_numero=D.gruponumero "
                . "AND D.codigo_persona=P.codigo ORDER BY A.semestre");
        $consulta->bindParam(':pde', $fac);
        $consulta->execute();
        $ces = null;

        $tabla_datos = $consulta->fetchAll(PDO::FETCH_NUM);

        $astraba = array();
        $sem = 1;
        $semes = array();

        foreach ($tabla_datos as $con) {
            if (((int) $con[2]) != $sem) {

                array_push($semes, $con);
                array_push($astraba, $semes);
                $semes = array();
                $sem = (int) $con[2];
            } else {

                array_push($semes, $con);
            }
        }
        if (count($semes) != 0) {
            array_push($astraba, $semes);
        }
        return $astraba;
    }

    /*
     * 
     */

    public function consultaMateria($cod, $gru) {
        $grdao = new grupoDAO();
        $asigdao = new asignaturaDAO();
        $udao = new unidadDAO();

        $grupos = $grdao->consultar($cod);
        $asign = $asigdao->consultar($cod);
        $retorno = array();

        foreach ($grupos as $grup) {
            $numgrupo = $grup->getGrupo_numero();
            $unidades = $udao->consultar($cod, $numgrupo);
            $datounidad = $this->cargapruebas($unidades, $numgrupo);
            array_push($retorno, array("grup" => $grup, "unid" => $datounidad));
        }
        return $retorno;
    }

    /*
     * 
     */

    public function cargapruebas($unidades, $numgrupo) {
        $prdao = new pruebaDAO();
        $datounidad = array();
        foreach ($unidades as $unidad) {
            $pruebas = $prdao->consultarPorUnidad($unidad->getId());
            $datoper = $this->cargapersonas($pruebas);
            array_push($datounidad, array("uni" => $unidad, "pru" => $datoper));
        }
        return $datounidad;
    }

    /*
     * 
     */

    public function cargapersonas($pruebas) {
        $datoper = array();
        foreach ($pruebas as $prueba) {
            $retor = $this->consultaDatos($prueba->getId());
            array_push($datoper, $retor);
        }
        return $datoper;
    }

    /*
     * 
     */

    public function consultaDatos($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare("SELECT PE.codigo , PE.nombre ,"
                . " PE.apellidos  FROM prueba P , matricula M  ,estudiante E ,"
                . "persona PE WHERE P.id_prueba=M.id AND E.id_matricula=M.id AND"
                . " PE.codigo = E.codigo_persona AND P.id =:idc");
        $consulta->bindParam(':idc', $id);
        $consulta->execute();
        $tabla_datos = $consulta->fetchAll(PDO::FETCH_NUM);
        $astraba = array();
        foreach ($tabla_datos as $con) {
            array_push($astraba, $con);
        }
        return $astraba;
    }

    /*
     * 
     */

    public function consultaestudiante($codigo) {

        $estudao = new estudianteDAO();
        $unidao = new unidadDAO();

        $matricula = $estudao->obtenerMatricula($codigo);
        $materias = $estudao->consultarMaterias($codigo);
        $combo = array();
        foreach ($materias as $materia) {
            $unidadesest = $unidao->consultar($materia["mat"]->getCodigo(), $materia["gru"]->getGrupo_numero());
            $contenido = $this->consultaTemaUnidad($unidadesest, $matricula);
            array_push($combo, array("materia" => $materia, "conten" => $contenido));
        }
        return $combo;
    }

    public function consultaTemaUnidad($unidades, $matricula) {
        $temada = new temaDAO();
        $temasu = array();
        foreach ($unidades as $unidad) {
            $temas = $temada->consultar($matricula->getId(), $unidad->getId());
            array_push($temasu, array("unidad" => $unidad, "tema" => $temas));
        }
        return $temasu;
    }

    /*
     * lista los docentes por facultad y departamento
     */

    public function listaDocente() {

        $facdao = new facultadDAO();
        $depdao = new departamentoDAO();
        $docdao = new docenteDAO();
        $perdao = new personaDAO();


        $facultades = $facdao->listar();

        $consulta = array();

        foreach ($facultades as $facultad) {

            $departamentos = $depdao->consultarporFacultad($facultad);
            $combo = array();

            foreach ($departamentos as $departamento) {

                $docentes = $docdao->consultarDepartamento($departamento->getNombre());

                $personas = array();
                foreach ($docentes as $docente) {
                    $persona = $perdao->consultar($docente->getCodigo_persona());
                    array_push($personas, $persona);
                }

                array_push($combo, array("dep" => $departamento, "pers" => $personas));
            }
            array_push($consulta, array("fac" => $facultad, "dep" => $combo));
        }

        return $consulta;
    }

    public function consultaMateriasDocente($cod) {
        $docdao = new docenteDAO();
        return $docdao->consultarMaterias($cod);
    }

    public function consultaMats() {
        $facDAo = new facultadDAO();
        $facs = $facDAo->listar();
        $progdao = new programaDAO();
        $pladao = new planestudioDAO();

        $facsprogs = array();
        foreach ($facs as $fac) {
            $progs = $progdao->consultarFacultad($fac);

            $progplanes = array();
            foreach ($progs as $pro) {
                $planes = $pladao->consultarPrograma($pro->getCodigo());
               


                $matplan = array();
                foreach ($planes as $plan) {
                    $materias = $this->listarmaterias($plan->getNombre());
                    array_push($matplan, array("plan" => $plan, "mat" => $materias));

                }
                 print_r($matplan);
                array_push($progplanes, array("prog" => $pro, "plan" => $matplan));
            }
            array_push($facsprogs, array("fac" => $fac, "pro" => $progplanes));
        }
        
        return $facsprogs;
    }

}

?>
