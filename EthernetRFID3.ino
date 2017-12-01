/*  PROYECTO MULTIMEDIA PULSERAS RFID 
 * 
 * CIRCUITO ARDUINO UNO - ETHERNET SHIELD - RFID
 * 
 * Signal      Pin RFID          Pin ETHERNET          
 * ---------------------------------------
 * RST/Reset   RST               9             
 * SPI SS      SDA(SS)           4         
 * SPI MOSI    MOSI              11 
 * SPI MISO    MISO              12    
 * SPI SCK     SCK               13 
 *             3.3V              3.3V
 *             GND               GND
 *             
 *************************************************************************************************/



#include <SPI.h> 
#include <Ethernet.h>   
#include <MFRC522.h>


#define RST_PIN  9    
#define SS_PIN  4   //(Cambia de pin 10 al 4, el 10 lo usa ethernet) 


//Creamos el objeto para el RC522
MFRC522 mfrc522(SS_PIN, RST_PIN); 


// Configuración de direccion MAC e IP. 
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; 
IPAddress ip(192,168,0,117);   


// Inicia la libreria Ethernet
EthernetClient client;


//IP servidor, pagina php
char server[] = "192.168.0.102";


//*************************************************************************************************


void setup() { 
  
  // Inicia el puerto serie. 
  Serial.begin(9600);   
  
  //Iniciamos el Bus SPI
  SPI.begin();        

  delay(1000);
  
  // Inicia la conexión Ethernet. 
  Ethernet.begin(mac, ip); 
  //server.begin(); 
  Serial.print("IP local del servidor "); 
  Serial.println(Ethernet.localIP()); 


  // Iniciamos  el MFRC522
  mfrc522.PCD_Init(); 
  Serial.println("Lectura del UID en espera");


}
  
//*************************************************************************************************


void loop() { 
    
    
      
    // Marcador para enviar la respuesta desde el servidor.         
    if(client.connect(server , 80)){              

      if (client.available()) {             
          char c = client.read();             
          Serial.write(c);
      }
      Serial.println("Nuevo cliente");   

      // Petición HTTP
      Serial.println ( "Conectado" ) ; 
            
      
      //Lectura del tag

      Serial.println("Acerque UID:");
      delay(1000);

      
      if ( mfrc522.PICC_IsNewCardPresent()){  
            
         
         if ( mfrc522.PICC_ReadCardSerial()){
             
             Serial.print("Card UID:");
             client.print ("GET /MediSud/arduino.php?tag="); 
             for (byte i = 0; i < mfrc522.uid.size; i++) {
                  //Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
                  Serial.print(mfrc522.uid.uidByte[i], HEX);   
                  //client.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
                  client.print(mfrc522.uid.uidByte[i], HEX);
              } 
              
              Serial.println();
              
              //Terminamos la lectura de la tarjeta  actual
              mfrc522.PICC_HaltA();     

              
              client.println ( " HTTP/1.0" );
              client.println ( "Host: " );
              client.print (server);
              client.println("User-Agent: arduino-ethernet");
              client.println ( "Connection: close" );             
              client.println("Refresh: 2");
              client.println();
              
          }      
      }

      
     }
     else{
      Serial.println("Conexion fallida");
     }
      
      
     delay(1);
     client.stop();
     Serial.println("Cliente desconectado");     
           
     
}        
