<?php
    interface StatistikDasar {
        public function median($arr);
        public function modus($arr);
    }

    interface Statistik {
        public function standarDeviasi($arr);
    }

    abstract class Analitik {
        public function itungItung($arr){
        }
    }
    class IndukPerhitungan extends Analitik implements StatistikDasar, Statistik {

        public function median($arr) {
            if (count ($arr) % 2 == 0){
                sort($arr);
                print_r($arr);
                $indexTengah = ceil(count($arr)/2) - 1;
                $median = ($arr[$indexTengah] + $arr [$indexTengah + 1 ]) /2;
                return $median;
            }else {
                sort($arr);
                print_r($arr);
                $indexTengah = ceil(count($arr)/2) - 1;
                $median = $arr[$indexTengah];
                return $median;
            }
        }

        public function modus($arr) {}
        public function standarDeviasi($arr) {}

        public function banyakGanjil($arr){
        $count = 0;
        foreach($arr as $val) {
            if ($val % 2 == 1) {
                $count++; // $count+= 1 // $count = $count + 1
            }
        }
        return $count;
    }
    public function banyakGenap($arr){
        $count = 0;
        foreach($arr as $val) {
            if ($val % 2 == 0) {
                $count++; // $count+= 1 // $count = $count + 1
            }
        }
        return $count;
    }
    public function total($arr){
        $total = 0;
        foreach($arr as $val) {
            $total += $val; // cara pertama
        }
        return $total;
    }

    public function rataRata($arr){
        $total = 0;
        foreach($arr as $val) {
            $total += $val; // cara pertama
        }
        return $total / count($arr);
    }

    public function min($arr){
        $min = $arr[0];
        foreach ($arr as $val) {
            if($min > $val) {
                $min = $val;
            }
        }
        return $min;
        }   

        public function max($arr){
            $min = $arr[0];
            foreach ($arr as $val) {
                if($max < $val) {
                    $max = $val;
                }
        }
        return $max;
        }
    }



class AnakAnalisa extends IndukPerhitungan {
    protected $maksArray;
    public function __construct($maksArray)
    {
        $this->maksArray =$maksArray;
    }

    public function initialArray(){
        $arr = array();
        for ($x = 0; $x < $this->maksArray; $x++) {
            array_push($arr, rand(1, 100));
        }

        echo "<br>Max " .max($arr);
        echo "<br>Min " .min($arr);
        echo "<br>Total " .$this->total($arr);
        echo "<br>rataRata " .$this->rataRata($arr);

    }
}  



$data = new AnakAnalisa(10);
$data->initialArray();
$arr = array();
for ($x = 0; $x < 50; $x++) {
    array_push ($arr, rand(1, 100));
}
print_r($arr);
$total = 0;

foreach($arr as $val){
    $total += $val; //cara pertama
}


echo "<br>Total ".$total;
echo "<br>Rata Rata ".$total/count($arr);

?>