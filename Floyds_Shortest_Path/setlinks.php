<html>
<head>
<title>ShortestPath</title>
</head>

<body>

<?php
	$numbnodes = $_POST["numbnodes"];
	$nodes = $_POST["nodes"];
	$links = $_POST["links"];
	$p_array = array_fill(0, $numbnodes, array_fill(0, $numbnodes, 0));


	echo "<p></p>";
	for ($i = 0; $i < $numbnodes; $i++){
		for ($j = 0; $j < $numbnodes; $j++){
			if ($links[$i][$j] < 0){
				$links[$i][$j] = INF;
			}
		}
	}

   class FloydsAlgo{
    	public $finalMatrix;
    	public $initialMatrix;
    	public $finalP;
    	public $nodes;
    	public $print_array;
    	public $count = 1;
    	public $col = 0;
    	
	    public function __construct($matrix,$finalP,$nodes){
		    $this->finalMatrix = $matrix;
		    $this->initialMatrix = $matrix;
		    $this->finalP = $finalP;
		    $this->nodes = $nodes;
		    $this->print_array = array_fill(0, count($nodes)*(count($nodes)-1), array_fill(0, count($nodes), -1)); 
    	}
	
    	public function floyd(){

	    	$n = count($this->finalMatrix);
	    	for ( $k = 0; $k < $n; $k++){
		    	for ($i = 0; $i < $n; $i++){
		    		for ($j = 0; $j < $n; $j++){
			    		if ($this->finalMatrix[$i][$j] > ($this->finalMatrix[$i][$k] + $this->finalMatrix[$k][$j])){
					    	$this->finalMatrix[$i][$j] = ($this->finalMatrix[$i][$k] + $this->finalMatrix[$k][$j]);
					    	$this->finalP[$i][$j] = $k+1;
				    	}
			    	}
		    	}
	    	}
    	}
    	public function path($q, $r){
            #print "v".$q." --&gt ";
            #print $this->nodes[$q-1]." --&gt ";
            #$this->print_array[$this->count-1][$this->col] = $this->nodes[$q-1];
            $this->print_array[$this->count-1][$this->col] = $q-1;
            $this->col++;
            $this->path2($q-1,$r-1);
            #print "v".$r;
            #print $this->nodes[$r-1];
            #$this->print_array[$this->count-1][$this->col] = $this->nodes[$r-1];
            $this->print_array[$this->count-1][$this->col] = $r-1;
            echo "<p></p>";
        
        }
        public function path2($q,$r){
            if ($this->finalP[$q][$r] != 0){
                $this->path2($q,$this->finalP[$q][$r]-1);
                #print "v".$this->finalP[$q][$r]." --&gt ";
               # print $this->nodes[$this->finalP[$q][$r]-1]." --&gt ";
                #$this->print_array[$this->count-1][$this->col] = $this->nodes[$this->finalP[$q][$r]-1];
                $this->print_array[$this->count-1][$this->col] = $this->finalP[$q][$r]-1;
                $this->col++;
                $this->path2($this->finalP[$q][$r]-1, $r);
            }
        }
        public function pathPrint(){
            $n = count($this->finalP);
            for ($i = 1; $i <= $n; $i++)
            {
                for ($j = 1; $j <= $n; $j++){
                    if ($i == $j){
                        continue;
                    }
                    else{
                        #if ($this->count < 10){
                           # print $this->count.".)  ";
                       # }
                       # else{
                       #     print $this->count.".) ";
                       # }
                        $this->path($i,$j);
                        $this->count++;
                        $this->col = 0;
                    }
                }
            }
        }
        public function prt(){
			for ($i=0;$i<count($this->print_array);$i++){
				for ($j=0;$j<count($this->print_array[$i]);$j++){
					print $this->print_array[$i][$j];
				}
				echo "<p></p>";
			}
		}
		public function prt2(){
			$count = 1;
			for ($i=0;$i<count($this->print_array);$i++){
				if ($count < 10){
					print " &nbsp ".$count.".) ";
					#echo $count.".) ";
				}
				else{
					print $count.".) ";
					#echo $count.".) ";
				}
				print $this->nodes[$this->print_array[$i][0]];
				$total = 0;
				for ($j=1;$j<count($this->print_array[$i]);$j++){
					$start = $this->print_array[$i][$j-1];
					$end = $this->print_array[$i][$j];
					if ($end >= 0 ){
						print " -- ".$this->finalMatrix[$start][$end]." -- &gt ".$this->nodes[$this->print_array[$i][$j]];
						$total += $this->finalMatrix[$start][$end];
					}
				}
				echo "<p></p>";
				print " &nbsp &nbsp Total: ".$total;
				echo "<p>&nbsp</p>";
				echo "<p></p>";
				$count++;
			}
		}
	
    }
    $m1 = new FloydsAlgo($links,$p_array,$nodes);
    $m1->floyd();
    $m1->pathPrint();    
	$m1->prt2();


?>

</body>
</html>
