<?php
//
//interface WorkableInterface{
//    public function work();
//}
//interface BreakableInterface{
//    public function break();
//}
//interface ManageableInterface{
//    public function manage();
//}
//
//class HumanWorker implements WorkableInterface , BreakableInterface, ManageableInterface{
//    public function work(){
//        echo 'Working';
//    }
//    // break
//    public function break(){
//        echo 'Break';
//    }
//    // manage
//    public function manage(){
//        $this->work();
//        $this->break();
//    }
//}
//class AndroidWorker implements WorkableInterface, ManageableInterface{
//    public function work(){
//        echo 'Working';
//    }
//    // manage
//    public function manage(){
//        $this->work();
//    }
//}
//
//class Captain
//{
//    public function manage(ManageableInterface $workers){
//        foreach ($workers as $worker) {
//            $worker->manage();
//        }
//    }
//}

interface ConnectionInterface
{
    public function connect();
}
class MySqlConnection implements ConnectionInterface
{
    public function connect()
    {
        echo 'Connect to MySql';
    }
}
class OracleConnection implements ConnectionInterface
{
    public function connect()
    {
        echo 'Connect to Oracle';
    }
}


class PasswordReminder
{

    public function __construct(ConnectionInterface $dbConnection)
    {
        $dbConnection->connect();
    }
}
