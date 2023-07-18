<?php

class Course_model extends CI_Model
{

function get_data($topic, $vendor, $level, $lang, $type, $duration){

    $query = "SELECT c.CourseId FROM courses c WHERE c.Stat=0 ";

    if(authuser()->role == 5 || authuser()->role == 6){
      $query .= " AND created_by ='".authuser()->id."'";
    }

    if(!empty($topic)){
      $query .= " AND c.TopicId = $topic";
    }

    if(!empty($vendor)){
      // $query .= " AND c.Vid = $vendor";

      $vendor = implode("','", $vendor);
      $query .= " AND c.Comp_cd IN ('".$vendor."') ";
    }

    if(!empty($level)){
      $level = implode("','", $level);
      $query .= " AND c.CourseId IN (Select clvl.CourseId from clvldet clvl where clvl.LevelId  IN('".$level."') )";
    }

    if(!empty($lang)){
      $lang = implode("','", $lang);
      $query .= " AND c.CourseId IN (Select clng.CourseId from clngdet clng where clng.LngId IN ('".$lang."') )";
    }

    if(!empty($type)){
      $type = implode("','", $type);
      $query .= " AND c.CourseId IN (Select cTyp.CourseId from ctypdet cTyp where cTyp.TypId IN('".$type."') )";
    }

    if(!empty($duration)){
      $query .= " AND c.CourseId IN (Select cdur.CourseId from cdurdet cdur where cdur.duration < '".$duration."' )";
    }

    // $query .= ' LIMIT '.$start.', ' . $limit;

    $res = $this->db->query($query)->result_array();
    // echo "<pre>";
    // print_r($res);die;
    $data = '';
    if(!empty($res)){
      $courseId = array_column($res, 'CourseId');

      $data = $this->db->select('c.*,cTyp.ARate ctype_rate, clng.ARate clang_rate, Duration, tt_name, langs.lang_name,langs.lang_id, tt_id, comp.Comp_cd, comp.Name, comp.Comp_no')
                      ->group_by('c.courseId')
                      ->join('ctypdet cTyp', 'cTyp.courseId = c.courseId', 'inner')
                      ->join('clngdet clng', 'clng.courseId = c.courseId', 'inner')
                      ->join('cdurdet cdur', 'cdur.CourseId = c.courseId' ,'inner')
                      ->join('company comp', 'comp.Comp_cd = c.Comp_cd' ,'inner')
                      ->join('tt_mst', 'tt_mst.tt_id = cTyp.TypId' ,'inner')
                      ->join('langs', 'langs.lang_id = clng.LngId' ,'inner')
                      ->where_in('c.CourseId',$courseId)
                      // ->where('comp.partner',5)
                      ->get('courses c')->result_array();
    }
    // echo "<pre>";
    // print_r($data);die;
    return $data;
}

    public function getCourseCount($topic, $vendor, $level, $lang, $type, $duration){

      $query = "SELECT count(c.CourseId) as total FROM courses c WHERE c.Stat=0 ";

        if(!empty($topic)){
          $query .= " AND c.TopicId = $topic";
        }

        if(!empty($vendor)){
          $vendor = implode("','", $vendor);
          $query .= " AND c.Comp_cd IN ('".$vendor."') ";
        }

        if(!empty($level)){
          $level = implode("','", $level);
          $query .= " AND c.CourseId IN (Select clvl.CourseId from clvldet clvl where clvl.LevelId  IN('".$level."') )";
         
        }

        if(!empty($lang)){
          $lang = implode("','", $lang);
          $query .= " AND c.CourseId IN (Select clng.CourseId from clngdet clng where clng.LngId IN ('".$lang."') )";
        }

        if(!empty($type)){
          $type = implode("','", $type);
          $query .= " AND c.CourseId IN (Select cTyp.CourseId from ctypdet cTyp where cTyp.TypId IN('".$type."') )";
        }

        if(!empty($duration)){
          $query .= " AND c.CourseId IN (Select cdur.CourseId from cdurdet cdur where cdur.duration < '".$duration."' )";
        }

        $res = $this->db->query($query)->row_array();
    }



    

}

?>