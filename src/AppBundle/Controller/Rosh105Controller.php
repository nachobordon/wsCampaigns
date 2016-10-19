<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use AppBundle\Services\rosh\Rosh;


class Rosh105Controller extends FOSRestController
{
    
    /**
     * @QueryParam(name="uei")
     * 
     * @View()
     */
    public function getUserAction(ParamFetcher $paramFetcher)
    {
        $UEIgamer = $paramFetcher->get('uei');

        /* @var $up105 \AppBundle\Services\rosh\Up105Manager */
        $up105 = $this->get('up105.manager');
        $rosh105 = $up105->getUserData($UEIgamer);

        return [
            'user' => $rosh105
        ];
    }
    
    /**
     * @RequestParam(name="uei")
     * @QueryParam(name="uei")
     * 
     * @View()
     */
    public function getUserCreateAction(ParamFetcher $paramFetcher)
//    public function postUserAction(ParamFetcher $paramFetcher)
    {
        //$UEIgamer = $paramFetcher->get('uei');
        $UEIgamer = $paramFetcher->get('uei');

        /* @var $up105 \AppBundle\Services\rosh\Up105Manager */
        $up105 = $this->get('up105.manager');
        $rosh105 = $up105->getUserData($UEIgamer);
        
        if($rosh105 == null){
            $rosh105 = $up105->createUser($UEIgamer);
        }

        return [
            'user' => $rosh105
        ];
    }
    
    /**
     * @QueryParam(name="a")
     * @QueryParam(name="uei")
     * @View()
     */
    public function getCheckParchmentAction(ParamFetcher $paramFetcher)
    {
        $answer = $paramFetcher->get('a');
        $UEIgamer = $paramFetcher->get('uei');
        
        /* @var $up105 \AppBundle\Services\rosh\Up105Manager */
        $up105 = $this->get('up105.manager');
        $rosh105 = $up105->getUserData($UEIgamer);
        $right_answer = $up105->parchmentAnswerChecker($answer);
        
        $rosh105 = null;
        if($right_answer){
            $rosh105 = $up105->setUserTestsPassed($rosh105, Rosh::UPDATE_105_PARCHMENT);
        }
            
        return [
            'right_answer' => $right_answer,
            'user'    => $rosh105
        ];
    }
    
    /**
     * @QueryParam(name="a")
     * @QueryParam(name="uei")
     * @View()
     */
    public function getCheckNotpassAction(ParamFetcher $paramFetcher)
    {
        $answer = $paramFetcher->get('a');
        $UEIgamer = $paramFetcher->get('uei');
        
        /* @var $up105 \AppBundle\Services\rosh\Up105Manager */
        $up105 = $this->get('up105.manager');
        $rosh105 = $up105->getUserData($UEIgamer);
        $right_answer = $up105->youCanNotPassAnswerChecker($answer);
                
        $rosh105 = null;
        if($right_answer){
            $rosh105 = $up105->setUserTestsPassed($rosh105, Rosh::UPDATE_105_NOT_PASS);
        }
        
        return [
            'right_answer'=> $right_answer,
            'user'    => $rosh105
        ];
    }
    
    /**
     * @QueryParam(name="a")
     * @QueryParam(name="uei")
     * @View()
     */
    public function getCheckThehiddenAction(ParamFetcher $paramFetcher)
    {
        $answer = $paramFetcher->get('a');
        $UEIgamer = $paramFetcher->get('uei');
        
        /* @var $up105 \AppBundle\Services\rosh\Up105Manager */
        $up105 = $this->get('up105.manager');
        $rosh105 = $up105->getUserData($UEIgamer);
        $right_answer = $up105->theHiddenAnswerChecker($answer);
                
        $rosh105 = null;
        if($right_answer){
            $rosh105 = $up105->setUserTestsPassed($rosh105, Rosh::UPDATE_105_THE_HIDEN);
        }
        
        return [
            'right_answer'=> $right_answer,
            'user'    => $rosh105
        ];
    }
    
    /**
     * @QueryParam(name="a")
     * @QueryParam(name="uei")
     * @View()
     */
    public function getCheckTicketsAction(ParamFetcher $paramFetcher)
    {
        $answer = $paramFetcher->get('a');
        $UEIgamer = $paramFetcher->get('uei');
        
        /* @var $up105 \AppBundle\Services\rosh\Up105Manager */
        $up105 = $this->get('up105.manager');        
        $rosh105 = $up105->getUserData($UEIgamer);
        $right_answer = $up105->ticketsAnswerChecker($rosh105, $answer);

        if($right_answer){
            $rosh105 = $up105->setUserTestsPassed($rosh105, Rosh::UPDATE_105_TICKETS);
        }
        
        return [
            'right_answer'=> $right_answer,
            'user'    => $rosh105
        ];
    }

}
