<?php

class Question_model extends CI_Model
{

  function getQuestionList(){

    $ques =  $this->db->select('ques.*,quesdet.sq_no,questions.Question, questions.QTyp,questions.QCd, questions.MaxRating')
                    ->join('quesdet', 'quesdet.QNo = ques.QNo', 'inner')
                    ->join('questions', 'questions.QCd = quesdet.QCd', 'inner')
                    // ->where('ques.CompDetCd',$company)
                    // ->where('ques.QFor', $qFor)
                    ->get_where('ques', array('ques.stat' => 0))
                    ->result_array();
    if(!empty($ques)){
      foreach ($ques as &$key) {
        $key['options'] = '';
        $options = $this->db->order_by('sq_no','ASC')->get_where('quesoptions', array('qcd' => $key['QCd']))->result_array();

        if(!empty($options)){
          $key['options'] = $options;
        }
      }
    }
    return $ques;
  }   


  function getDomainSubdomainList(){
    return $this->db->select('do.*, sub.SDCd, sub.SubDomain,dsub.SSDCd,dsub.SubSubDomain')
                    // ->limit(5)
                    ->join('domainsub sub', 'sub.DCd = do.DCd', 'inner')
                    ->join('domainsubsub dsub','dsub.SDCd = sub.SDCd','left')
                    ->get('domain do')->result_array();
  } 

}

?>

