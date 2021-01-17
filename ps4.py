tek=[]
cift=[]
cikti=[]
sayi = int(input('Listeye kaç sayı eklenecek: '))
for n in range(sayi):
    sayi=int(input("{}. sayıyı girin :". format(n+1)))
    if sayi not  in tek or cift:
        if sayi%2==0:
            cift.append(sayi)
        else:
            tek.append(sayi)
cikti=tek+cift
print(cikti)
print("çıktı :", max(tek))   