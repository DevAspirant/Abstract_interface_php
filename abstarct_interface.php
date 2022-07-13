<?
/* Abstract class :    عبارة عن كلاس لا يمكن عمل كائنات منها و لكن في الغالب يتم توارثها لوجود عمليات فيها يمكن تنفيذها بالاضافة الى أن كل ميثود موجود في كل كلاس له طريقة ادخال مختلفة او المحتوي يكون مختلف    
* need the properties or methods as references
* As Access modifer you can use any access (public, private and protected)
*/
abstract class Employee {
    public $name;
    public $age;
    public $salary;
    public $address;
    public $tax;
    public $overtime;
    public $overtimeRate;
    public $abbsent;

    public $abbsentRate;

    abstract public function showName(); // this is only for abstract method 

    public function getOvertime(){
        return $this->overtime * $this->overtimeRate;
    }

    public function getAbbsent(){
        return $this->abbsent * $this->abbsentRate;
    }

    public function getSalary(){
        return $this->salary - ($this->salary * $this->tax);
    }

    abstract public function showTotalSalary();
}

/* Interface class :  عبارة عن كلاس تكون المبرمج مجبر على استخدام جميع العناصر و الملحقات فيه عند استخدامه
 * As access modifier into interface you will use only public modifier 
 * لتطبيق الواجهات في php نقون باستخدام كلمة implements
*/
interface EmployeeInterface
{
    public function showAddress();
}

class Manager extends Employee implements EmployeeInterface{ 

    public $numberOfAudit;
    public function showName()
    {
        return 'the manager name:' . $this->name;
    }

    public function showTotalSalary()
    
        {
            return $this->getSalary() + $this->getOvertime() - $this->getAbbsent() + $this->numberOfAudit * 100;
        }

    public function showAddress()
    {
        return $this->address;
    }    
    
}

class SuperVisor extends Employee{
    public $successfullProject;
    public function showName()
    {
        return 'the supervisor name:' . $this->name;
    }
    public function showTotalSalary()
    
    {
        return $this->getSalary() + $this->getOvertime() - $this->getAbbsent() + $this->successfullProject * 1000;
    }
}

class Worker extends Employee {

    public $bouns = 100; 
   
    public function showName()
    {
        return 'the worker name:' . $this->name;
    }
    public function showTotalSalary()
    
    {
        return $this->getSalary() + $this->getOvertime() - $this->getAbbsent() + $this->bouns;
    }
}


/* Main */
/* Manager Salary  */
$ammar = new Manager();
$ammar->name = 'ammar';
$ammar->salary = 5000;
$ammar->tax = 0.01;
$ammar->overtime = 30;
$ammar->overtimeRate = 15;
$ammar->abbsent = 2;
$ammar->abbsentRate = 75;
$ammar->numberOfAudit = 10;
echo $ammar->showTotalSalary() . " SAR";
$ammar->address = "JED";
echo $ammar->showAddress();
/* ماهو الغرق بين interface & abstract
* Abstract : كانه كلاس انت بضيف كل الاشياء الي راح يكون المبرمج مجبر انه يستخدمها
* interface : هنا على حسب ملاحظتي لاحظت انه عبارة عن ميثود و اورامر فقط
*/

?>

