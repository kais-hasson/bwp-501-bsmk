<?php

class job
{
    public $id;
    public $job_name;
    public $job_title;
    public $salary;
    function __construct($new_job)
    {
        $this->id=$new_job['id'];
        $this->job_name=$new_job['job_name'];
        $this->job_title=$new_job['job_title'];
        $this->salary=$new_job['salary'];
    }
    function new_job()
    {
        return $this->new_job();
    }
}