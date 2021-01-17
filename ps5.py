class Okul():
    def __init__(self,isim,tur):
        self.isim=isim
        self.tur=tur
    def bilgilerigoster(self):
        print("isim : {} \n türü : {}\n".format(self.isim,self.tur))
class Calisan():
    def __init__(self,adi_soyadi,unvan,maas):
        self.adi_soyadi=adi_soyadi
        self.unvan=unvan
        self.maas=maas
    def calisan_bilgigoster(self):
         print("adı soyadı : {} \n ünvan : {}\n maaş : {}\n".format(self.adi_soyadi,self.unvan,self.maas))
class Bolum(Okul): # 1. okul universite
    def __init__(self,isim,tur,b_isim,kisisayisi):
        self.isim=isim
        self.tur=tur
        self.b_isim=b_isim
        self.kisisayisi=kisisayisi
    def kisi_arttir(self,kisi_miktari):
        print("kisi sayisi arttırılıyor")
        self.kisisayisi+=kisi_miktari
    def bilgilerigoster(self):
        print("isim : {} \n türü : {}\n b_isim : {}\n kisisayisi : {}\n".format(self.isim,self.tur,self.b_isim,self.kisisayisi))
class Ilkokul(Okul): # 2. okul ilkokul
    def __init__(self,isim,tur,b_isim,kisisayisi):
        self.isim=isim
        self.tur=tur
        self.b_isim=b_isim
        self.kisisayisi=kisisayisi
    def kisi_arttir(self,kisi_miktari):
        print("kisi sayisi arttırılıyor")
        self.kisisayisi+=kisi_miktari
    def bilgilerigoster(self):
        print("isim : {} \n türü : {}\n b_isim : {}\n kisisayisi : {}\n".format(self.isim,self.tur,self.b_isim,self.kisisayisi))
class Anaokulu(Okul): # 3. okul anaokulu
     def __init__(self,isim,tur,b_isim,kisisayisi):
        self.isim=isim
        self.tur=tur
        self.b_isim=b_isim
        self.kisisayisi=kisisayisi
def kisi_arttir(self,kisi_miktari):
        print("kisi sayisi arttırılıyor")
        self.kisisayisi+=kisi_miktari
def bilgilerigoster(self):
        print("isim : {} \n türü : {}\n b_isim : {}\n kisisayisi : {}\n".format(self.isim,self.tur,self.b_isim,self.kisisayisi))
class BilgMuh(Bolum):
    def __init__(self,isim,tur,b_isim,kisisayisi):
        self.isim=isim
        self.tur=tur
        self.b_isim=b_isim
        self.kisisayisi=kisisayisi
    def bilgilerigoster(self):
        print("isim : {} \n türü : {}\n b_isim : {}\n kisisayisi : {}\n".format(self.isim,self.tur,self.b_isim,self.kisisayisi))
class MakineMuh(Bolum):
    def __init__(self,isim,tur,b_isim,kisisayisi):
        self.isim=isim
        self.tur=tur
        self.b_isim=b_isim
        self.kisisayisi=kisisayisi
    def bilgilerigoster(self):
        print("isim : {} \n türü : {}\n b_isim : {}\n kisisayisi : {}\n".format(self.isim,self.tur,self.b_isim,self.kisisayisi))
class Sınıf(Bolum):
    def __init__(self,isim,tur,b_isim,kisisayisi):
        self.isim=isim
        self.tur=tur
        self.b_isim=b_isim
        self.kisisayisi=kisisayisi
    def bilgilerigoster(self):
        print("isim : {} \n türü : {}\n b_isim : {}\n kisisayisi : {}\n".format(self.isim,self.tur,self.b_isim,self.kisisayisi))
class Ogretmen(Calisan):
    def __init__(self,adi_soyadi,unvan,maas,b_alan):
        self.adi_soyadi=adi_soyadi
        self.unvan=unvan
        self.maas=maas
        self.b_alan=b_alan
    def calisan_bilgigoster(self):
        
        print("akademisyen sınıfının bilgileri.....")
        
        print("adı soyadı : {} \n unvan: {} \n maaş: {}\n b_alan: {}".format(self.adi_soyadi,self.unvan,self.maas,self.b_alan))
    def zam_yap(self,zam_miktarı):
        print("Maaşa zam yapılıyor....")
        self.maas += zam_miktarı 
class Akademisyen(Calisan):
    def __init__(self,adi_soyadi,unvan,maas,b_alan):
        self.adi_soyadi=adi_soyadi
        self.unvan=unvan
        self.maas=maas
        self.b_alan=b_alan
    def calisan_bilgigoster(self):
        
        print("akademisyen sınıfının bilgileri.....")
        
        print("adı soyadı : {} \n unvan: {} \n maaş: {}\n b_alan: {}".format(self.adi_soyadi,self.unvan,self.maas,self.b_alan))
    def zam_yap(self,zam_miktarı):
        print("Maaşa zam yapılıyor....")
        self.maas += zam_miktarı
class Personel(Calisan):
    def __init__(self,adi_soyadi,unvan,maas,b_alan):
        self.adi_soyadi=adi_soyadi
        self.unvan=unvan
        self.maas=maas
        self.b_alan=b_alan
    def calisan_bilgigoster(self):
        
        print("personel sınıfının bilgileri.....")
        
        print("adı soyadı : {} \n unvan: {} \n maaş: {}\n b_alan: {}".format(self.adi_soyadi,self.unvan,self.maas,self.b_alan))
    def zam_yap(self,zam_miktarı):
        print("Maaşa zam yapılıyor....")
        self.maas += zam_miktarı