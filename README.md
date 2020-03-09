# Notifications
PHP Notification handler

### Supported notification channels
- Sms.ir
- Laravel email

## Instalation
- ``` composer require grigio/notifications ```
- Add this environment variables to .env
  ```
    SMSIR_SECRET_KEY=
    SMSIR_API_KEY=
    SMSIR_NUMBER=
  ```
- Email channel use ```MAIL_USERNAME``` as from address and ```APP_NAME``` as name for sending emails
- Create your notification class like this
  ```
  class YourNotification extends GrigioNotification {
  
    public function viaSmsIR()
    {
        $data = $this->data();
        $this->setReceiver(
          //Get mobile from $data
        );
        $this->setMessage(
            //Put your message here
        );
        return $this->sendPrepration();
    }

    public function viaEmail()
    {
        $data = $this->data();
        $this->setSubject(
          // Email title
        );
        $this->setReceiver(
          //Reciver email address
        );
        $this->setMessage(view('Your Email Template', ['data' => $data]));
        return $this->sendPrepration();

    }
  }
  ```
  
- Use ``` Notifible ``` trait in your model
- Now in your method that you want send notification 
 ```
    $order->notify(new YourNotification($order));
 ```
 
 
 ## Channel development will add soon ...
