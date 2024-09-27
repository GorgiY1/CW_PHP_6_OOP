<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php 
            interface ICounter {
                function increment() : void;
                function decrement() : void;
                function get_value() : int;
            }
            class Counter implements ICounter {
                public function __construct(
                    private $value = 0,
                    private int $min = 0,
                    private int $max = 100
                ){
                    if($min >= $max) throw new InvalidArgumentException("Error value");
                    
                    $this->value = $value;
                    $this->min = $min;
                    $this->max = $max;
                }
                function increment() : void {
                    if($this->value < $this->max) $this->value++;
                }
                function decrement() : void {
                    if($this->value > $this->min) $this->value++;
                }
                function get_value() : int {
                    return $this->value;
                }
                public function print_counter(ICounter $counter) : void {
                    $counter->increment();
                    echo "<p>".$counter->get_value()."</p>";
                    $counter->decrement();
                    echo "<p>".$counter->get_value()."</p>";
                }
            }
            $counter = new Counter();

            for ($i=0; $i < 50; $i++) { 
                $counter->increment();
            }
            $counter->print_counter($counter);
        ?>
    </div>
</body>
</html>