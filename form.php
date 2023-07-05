<?php

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) 
//kullaniciadi ve sifre tanimli mi kontrol eder eğer boş ise ve çıkış yapılırsa echoyu işleme sokar
{ 
  header('WWW-Authenticate: Basic realm="Kullanıcı Girişi"');
  header('HTTP/1.0 401 Unauthorized');
  echo 'Giriş Yapmadınız!';
  exit;
} 
else
  {
    $kullaniciadi = base64_encode($_SERVER['PHP_AUTH_USER']); 
    $sifre = base64_encode($_SERVER['PHP_AUTH_PW']);
    //değişkenin içine base64 olarak kullanıcının girdiği veriyi(kullanıcıadı ve şifre) alır

    if($kullaniciadi != base64_encode('admin') || $sifre != base64_encode('sifre')) 
    //giriş sağlandığında 13-14. satırdaki kodlarla beraber kullanıcının girdiği verinin eşitliğini kontrol eder  kullnaıcı adı doğru değilse(erişim izni kontrolü) direkt echo yu döndürür doğru ise sonrasında şifreyi de kontrol eder.
    {
      header('HTTP/1.0 401 Unauthorized');
      echo 'Geçersiz kullanıcı adı veya şifre!';
      exit;
    }
  }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <form method="POST"  action="kaydet.php">
            <img src="digiturk-logo.jpg" style="width: 52%;" alt="">
            <img src="Samsunspor_logo_2.png" style="width: 27%;float: right;" alt="">
       
            <h1>Kayıt Formu</h1>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="text" name="name" required>
                <label for="">İsim</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="text" name="surname" required >
                <label for="">Soy İsim</label>
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="text" id="phone"  name="phone"required>
                <label for="">Telefon numarası</label>
            </div>
            <div class="forget">
                <label for=""><input type="checkbox" id="myCheckbox"> <a href="#" id="modalLink" style="color: aqua;">Samsunspor taraftar paketi aydınlatma metnini</a> ve <a id="modalLink" href="#" style="color: aqua;">Gizlilik özleşmesi</a>'ni  kabul ediyorum</label>
            </div>
            <button disabled id="myButton">Talep Oluştur</button>
           
        </form>
        <div id="myModal" class="modal">
            <div class="modal-content" style="width: 80%;">
              <span class="close">&times;</span>
              <img src="Samsunspor_logo_2.png" style="width: 20%;" alt="">
              <p><span>SAMSUNSPOR TARAFTAR PAKETİ AYDINLATMA METNİ </span><br>
                İşbu aydınlatma metni, Samsunspor Futbol Kulübü A.Ş. (“Samsunspor”) tarafından işletilen https://www.samsunspor.org.tr/index.php internet sitesinde ve Samsunspor ve Store 55 sosyal medya hesaplarında yer alan “SamsunSpor Taraftar Paketi İletişim Formu” aracılığıyla Samsunspor tarafından elde edilen kişisel verilerinizin işlenme süreçleri hakkında 6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”) ve ilgili mevzuat çerçevesinde bilgilendirilmeniz amacıyla hazırlanmıştır. 
                ⦁	Kişisel Veri İşleme Faaliyeti ve Kapsamı
                Samsunspor ile [*] aracılığıyla paylaştığınız kişisel verileriniz fiziksel ve/veya elektronik ortamda açık rızanızın varlığı halinde Samsunspor tarafından işlenmektedir:
                ⦁	Ad-Soyad,
                ⦁	Telefon numarası.
                ⦁	Kişisel Verilerin İşlenme Yöntemi ve Amacı
                Bu süreçte toplanan kişisel verileriniz, Samsunspor tarafından Digitürk SamsunSpor Taraftar Paketi hakkında bilgi verilmesi ve kampanyadan faydalanabilmeniz amacıyla Digitürk ile iş birliği yapılması amaçlarıyla  otomatik ve otomatik olmayan yöntemlerle işlenir. Samsunspor, kişisel verilerinizin işlenmesi bakımından belirtilen amaç ve dayanakların dışına çıkmayacaktır.
                ⦁	Kişisel Verilerin Aktarımı
                Kampanyadan faydalanabilmeniz amacıyla Digitürk ile aramızdaki iş birliği kapsamında, Samsunspor kişisel verilerinizi yurt içinde yerleşik [İLTŞ.TEKN.SAN ve TİC LTD.ŞTİ]‘ (“Diginokta”) açık rızanızın varlığı halinde aktarmaktadır. 
                Samsunspor yukarıda belirtilen kişisel verilerinizi, yurt dışında yerleşik üçüncü taraflarla paylaşmaz. 
                ⦁	Kişisel Verilerin İşlenme Süresi
                Samsunspor, işlediği kişisel verileri teknolojik yöntemler dahilinde doğru ve güncel olarak, uygun güvenlik tedbirlerini almak suretiyle muhafaza etmektedir. Samsunspor, işlenmesini gerektiren sebeplerin ortadan kalkması ve/veya mevzuatta öngörülen sürelerin dolması halinde kişisel verileri re’sen veya talebiniz üzerine siler, yok eder veya anonim hale getirir. 
                ⦁	Haklarınız
                Samsunspor tarafından işlenen kişisel verilerinize ilişkin aşağıdaki haklara sahipsiniz:
                ⦁	Kişisel verilerinizin işlenip işlenmediğini öğrenme;
                ⦁	Kişisel verileriniz işlenmişse buna ilişkin bilgi talep etme;
                ⦁	Kişisel verilerinizin işlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını öğrenme;
                ⦁	Kişisel verilerinizin yurt içinde veya yurt dışında aktarıldığı üçüncü kişileri öğrenme;
                ⦁	Kişisel verilerinizin eksik veya yanlış işlenmiş olması hâlinde bunların düzeltilmesini isteme;
                ⦁	Kişisel verilerinizin KVKK m. 7 çerçevesinde silinmesini veya yok edilmesini isteme;
                ⦁	Kişisel verileriniz üzerinde gerçekleştirilen değişiklik ve imha işlemlerinin, kişisel verilerin aktarıldığı üçüncü kişilere bildirilmesini isteme;
                ⦁	İşlenen kişisel verilerinizin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle aleyhinize bir sonucun ortaya çıkması halinde buna itiraz etme; 
                ⦁	Kişisel verilerinizin kanuna aykırı olarak işlenmesi sebebiyle zarara uğramanız hâlinde zararın giderilmesini talep etme.
                Yukarıda belirtilen hakların kullanılması için kimliğinizin tespitini sağlayacak bilgiler ile birlikte söz konusu taleplerinizi aşağıdaki iletişim yollarından herhangi birinden yararlanarak yazılı şekilde Samsunspor’a iletmeniz gerekir.
                ⦁	info@samsunspor.org.tr adresine, elektronik posta vasıtasıyla;
                ⦁	Yenimahalle Mah. Atatürk Bulvarı Samsunspor Sit. Tesisleri No:7/7 Canik/SAMSUN adresine posta yoluyla.
                
                AÇIK RIZA BEYANI
                 Samsunspor tarafından 6698 sayılı Kişisel Verilerin Korunması Kanunu ve ilgili mevzuat kapsamında yapılan bilgilendirmeyi okudum, anladım. 
                 Formda yer alan kişisel verilerimin bilgilendirme metninde belirtilen amaçlarla Samsunspor tarafından işlenmesine ve [İLTŞ.TEKN.SAN ve TİC LTD.ŞTİ ] (“Diginokta”) ile paylaşılmasına rıza veriyorum.			                 
                </p>
            </div>
          </div>
          <script>
            var modalLink = document.getElementById("modalLink");

 
var modal = document.getElementById("myModal");

 
var close = document.getElementsByClassName("close")[0];

// Modal açma işlemi
modalLink.onclick = function(event) {
  event.preventDefault();  
  modal.style.display = "block";
}

 
close.onclick = function() {
  modal.style.display = "none";
}

 
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
var checkbox = document.getElementById("myCheckbox");
var button = document.getElementById("myButton");

// Onay kutusunun durumunu kontrol et
checkbox.addEventListener("change", function() {
  if (checkbox.checked) {
    button.disabled = false; // Eğer seçiliyse düğmeyi etkinleştir
  } else {
    button.disabled = true; // Eğer seçili değilse düğmeyi devre dışı bırak
  }
});
$("#phone").inputmask({"mask": "(999) 999-9999"});
 </script>
  
</body>
</html>

