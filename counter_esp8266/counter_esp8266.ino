#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>

const  char* ssid = "rdhdev"; //masukkan ssid
const char* password = "lupasandi"; //masukkan password

const int buzzer = D1;
const int  button = D2;
const int infrared = D3;

boolean Object = false;
int hitung = 0;
 
void setup () {

  Serial.begin(115200);
  WiFi.begin(ssid, password);

   pinMode(buzzer, OUTPUT);
   pinMode(infrared, INPUT);
   pinMode(button, INPUT_PULLUP);

  while (WiFi.status() != WL_CONNECTED) {

    delay(1000);
    Serial.println("Connecting..");

  }

  if(WiFi.status() == WL_CONNECTED){
    Serial.println("Connected!!!");
  }
  else{
    Serial.println("Connected Failed!!!");
  }

}

void loop() {
  
  if (WiFi.status() == WL_CONNECTED) {

    HTTPClient http;

    
    int readSensor = digitalRead(infrared);
      //ganti dengan ipaddress komputer anda
      http.begin("http://192.168.1.9/live-counting/proses.php?hitung=" + String(hitung));
    
    int httpCode = http.GET();
    
    if (httpCode > 0) {
      char json[500];
      String payload = http.getString();
      payload.toCharArray(json, 500);
      
      //StaticJsonDocument<200> doc;
      DynamicJsonDocument doc(JSON_OBJECT_SIZE(2));

     // Deserialize the JSON document
       deserializeJson(doc, json);

     int batas = doc["batas"];
     String Reset = doc["Reset"];


     if (readSensor == 0 && Object == false){
        if(hitung < batas || batas == 0){
           hitung++;
           Object = true;
           Serial.print("hitung = ");
           Serial.println(hitung);
           digitalWrite(buzzer, HIGH);
           delay(100);
           digitalWrite(buzzer, LOW);
           delay(100);
        }
        else{
           digitalWrite(buzzer, HIGH);
           delay(1000);
           digitalWrite(buzzer, LOW);
           delay(1000);
        }
     }
     else if(readSensor == 1 && Object == true){
       Object = false;
     }      

     //reset hitungan
     int buttonState = digitalRead(button);
     if ( buttonState == 1 ){
       hitung = 0;
       Serial.print("hitung = ");
       Serial.println(hitung);
       for(int i = 1; i<=2; i++){
         digitalWrite(buzzer, HIGH);
         delay(100);
         digitalWrite(buzzer, LOW);
         delay(100);
       }
     }
      
     delay(200);

     
      
      
    }

    http.end();

  }

}
