<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(135deg, #6600CC, #CC99FF);
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
            background-color: darkslateblue; /* Semi-transparent background */
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
        <!-- <?php 
            abstract class Messanger {
                
                protected string $name;
                abstract function send(string $massage):void;
                public function __construct(string $name)
                {
                    $this->name = $name;

                }
                public function close() {
                    echo "Closed <hr>";
                }
            }
            class TelegramMessanger extends Messanger {
                public function send(string $massage):void {
                    echo "TelegramMessanger Send message: $massage from $this->name to Telegram <hr>";
                }
                public function print_name() : void {
                    echo "Name: $this->name <hr>";
                }
            }

            class TelegramBot extends TelegramMessanger {
                public function send(string $massage):void {
                    echo "TelegramBot Send message: $massage from $this->name to Telegram <hr>";
                }
                public function print_name() : void {
                    echo "Name: $this->name <hr>";
                }
            }
            $web_tel = new TelegramMessanger("Telegram Messanger");
            $telegram_bot = new TelegramBot("Telegram Bot");
            $web_tel->send("Hello from Web Telegram");
            $telegram_bot->send("Hello from Telegram Bot");
            $web_tel->print_name();
            $telegram_bot->print_name();

            //================================================
            trait PrinterTraits {
                public int $id;
                public function __construct(int $id) {
                    $this->id = $id;
                }
                public function send_image($image) : void {
                    echo "Printing the $image<hr>";
                }
                public function send_text(string $text) : void {
                    echo "Printing the $text<hr>";
                }
            }
            trait TestTrait {
                public function send_text_2(string $text) : void {
                    echo "Printing the $text<hr>";
                }
            }
            class Printer {
                use PrinterTraits;
                use TestTrait;
                public string $vender;
            }
        
            class Message extends Printer {}
            $message = new Message(5);
            $message->send_text("Hello");
            $message->send_text_2("Hello");
            
        ?> -->

        <?php 
            interface IMessage {
                function send(string $message):void;
                function create(string $message): void;
                function read(int $index): ?string;
                function update(int $index, string $newMessage): void;
                function delete(int $index): void;
            }
            
            class ServiceMessage implements IMessage {
                private array $messages = []; // Array to store messages

                // Implementing send method (creating a message)
                public function send(string $message): void {
                    $this->create($message);
                }

                // Method to create a new message
                public function create(string $message): void {
                    $this->messages[] = $message;
                    echo "Message created: $message<br>";
                }

                // Method to read a message by index
                public function read(int $index): ?string {
                    if (isset($this->messages[$index])) {
                        return $this->messages[$index];
                    }
                    return null; // Return null if index does not exist
                }

                // Method to read all messages with indexes
                public function readAll(): array {
                    $result = [];
                    foreach ($this->messages as $index => $message) {
                        $result[$index] = "Index $index: $message";
                    }
                    return $result;
                }

                // Method to update a message by index
                public function update(int $index, string $newMessage): void {
                    if (isset($this->messages[$index])) {
                        $this->messages[$index] = $newMessage;
                        echo "Message updated at index $index: $newMessage<br>";
                    } else {
                        echo "No message found at index $index to update.<br>";
                    }
                }

                // Method to delete a message by index
                public function delete(int $index): void {
                    if (isset($this->messages[$index])) {
                        unset($this->messages[$index]);
                        // Reindex array after deletion
                        $this->messages = array_values($this->messages);
                        echo "Message deleted at index $index.<br>";
                    } else {
                        echo "No message found at index $index to delete.<br>";
                    }
                }
            }

            // Example usage of ServiceMessage class
            $service = new ServiceMessage();
            $service->send("Hello, World!"); // Create a new message
            $service->send("PHP is awesome!"); // Create another message

            echo "<p>" . $service->read(0) . "</p>"; // Read the first message

            $service->update(1, "PHP is super awesome!"); // Update the second message

            $service->delete(0); // Delete the first message

            // Display all remaining messages with their indexes
            foreach ($service->readAll() as $message) {
                echo "<p>$message</p>";
            }
        ?>
    </div>
</body>
</html>