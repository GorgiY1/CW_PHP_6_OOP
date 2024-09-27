<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(135deg, #000428, #004e92); /* Gradient background */
            color: #fff; /* White text */
            font-family: 'Roboto', sans-serif; /* Modern font */
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height */
            overflow: hidden; /* Hide overflow */
        }
        .container {
            background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent background */
            padding: 30px; /* Larger padding */
            border: 2px solid lightblue;
            box-shadow: 0 0 75px rgba(0, 255, 255, 0.5);
            border-radius: 30px; /* More rounded corners */
            
            text-align: center; /* Center text */
            color:#fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php 
            // interface IEmailMessenger extends IMessenger {
            //     function send();
            // }
            // class EmailMessanger implements IMessenger {
            //     public function send() {
            //         echo "Sending the message to email ... <hr>";
            //     }
            // }

            // $outlook = new EmailMessanger();
            // $outlook->send();
            interface IMessenger {
                function send_message(string $message) : void;
            }
            interface ICamera {
                function make_video();
                function make_photo();
            }
            class Mobile implements ICamera, IMessenger {
                function make_video() : void {
                    echo "Making video ... <hr>";
                }
                function make_photo() : void {
                    echo "Making photo ... <hr>";
                }
                function send_message(string $message) : void {
                    echo "Sending the message: $message to email ... <hr>";
                }
            }
            $phone = new Mobile();
            $phone->make_video();
            $phone->make_photo();
            $phone->send_message("Hello world!");

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
                    if($this->value > $this->min) $this->value--;
                }
                function get_value() : int {
                    return $this->value;
                }
                public function print_counter(ICounter $counter) : void {
                    $counter->increment();
                    echo "<p> After increment: ".$counter->get_value()."</p>";
                    $counter->decrement();
                    echo "<p> After decrement: ".$counter->get_value()."</p>";


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