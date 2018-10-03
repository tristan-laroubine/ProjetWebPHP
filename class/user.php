<?php
/**
 * Created by PhpStorm.
 * User: l17002521
 * Date: 03/10/18
 * Time: 09:32
 */

class user
{
    private $ID_USER;
    private $USERNAME_USER;
    private $MDP_USER;
    private $GRADE_USER;
    private $EMAIL_USER;
    private $RECUP_USER;

    /**
     * user constructor.
     * @param $ID_USER
     * @param $USERNAME_USER
     * @param $MDP_USER
     * @param $GRADE_USER
     * @param $EMAIL_USER
     * @param $RECUP_USER
     */
    public function __construct($ID_USER, $USERNAME_USER, $MDP_USER, $GRADE_USER, $EMAIL_USER, $RECUP_USER)
    {
        $this->ID_USER = $ID_USER;
        $this->USERNAME_USER = $USERNAME_USER;
        $this->MDP_USER = $MDP_USER;
        $this->GRADE_USER = $GRADE_USER;
        $this->EMAIL_USER = $EMAIL_USER;
        $this->RECUP_USER = $RECUP_USER;
    }

    /**
     * @return mixed
     */
    public function getIDUSER()
    {
        return $this->ID_USER;
    }

    /**
     * @param mixed $ID_USER
     */
    public function setIDUSER($ID_USER)
    {
        $this->ID_USER = $ID_USER;
    }

    /**
     * @return mixed
     */
    public function getUSERNAMEUSER()
    {
        return $this->USERNAME_USER;
    }

    /**
     * @param mixed $USERNAME_USER
     */
    public function setUSERNAMEUSER($USERNAME_USER)
    {
        $this->USERNAME_USER = $USERNAME_USER;
    }

    /**
     * @return mixed
     */
    public function getMDPUSER()
    {
        return $this->MDP_USER;
    }

    /**
     * @param mixed $MDP_USER
     */
    public function setMDPUSER($MDP_USER)
    {
        $this->MDP_USER = $MDP_USER;
    }

    /**
     * @return mixed
     */
    public function getGRADEUSER()
    {
        return $this->GRADE_USER;
    }

    /**
     * @param mixed $GRADE_USER
     */
    public function setGRADEUSER($GRADE_USER)
    {
        $this->GRADE_USER = $GRADE_USER;
    }

    /**
     * @return mixed
     */
    public function getEMAILUSER()
    {
        return $this->EMAIL_USER;
    }

    /**
     * @param mixed $EMAIL_USER
     */
    public function setEMAILUSER($EMAIL_USER)
    {
        $this->EMAIL_USER = $EMAIL_USER;
    }

    /**
     * @return mixed
     */
    public function getRECUPUSER()
    {
        return $this->RECUP_USER;
    }

    /**
     * @param mixed $RECUP_USER
     */
    public function setRECUPUSER($RECUP_USER)
    {
        $this->RECUP_USER = $RECUP_USER;
    }


    /** TEST FUNCTION DEBUG MODE */
    public function showUser()
    {

        echo 'ID USER : '.$this->ID_USER.' USERNAME USER '. $this->USERNAME_USER;
    }

}