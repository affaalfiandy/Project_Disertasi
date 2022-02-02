
//SNRSCORE
setInterval(function(){fetch('https://api.thingspeak.com/channels/1078947/fields/1.json?results=2')
.then((response) => { 
    return response.json().then((data) => {
        console.log(data.feeds[1].field1);
        const SNR = data.feeds[1].field1
        if(SNR == 100){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-primary w-100"
        }else if(SNR < 100 && SNR >= 95){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-primary w-95"
        }else if(SNR < 95 && SNR >= 90){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-primary w-90"
        }else if(SNR < 90 && SNR >= 85){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-primary w-85"
        }else if(SNR < 85 && SNR >= 80){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-info w-80"
        }else if(SNR < 80 && SNR >= 75){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-info w-75"
        }else if(SNR < 75 && SNR >= 70){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-info w-70"
        }else if(SNR < 70 && SNR >= 65){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-info w-65"
        }else if(SNR < 65 && SNR >= 60){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-success w-60"
        }else if(SNR < 60 && SNR >= 55){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-success w-55"
        }else if(SNR < 55 && SNR >= 50){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-success w-50"
        }else if(SNR < 50 && SNR >= 45){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-success w-45"
        }else if(SNR < 45 && SNR >= 40){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-warning w-40"
        }else if(SNR < 40 && SNR >= 35){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-warning w-35"
        }else if(SNR < 35 && SNR >= 30){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-warning w-30"
        }else if(SNR < 30 && SNR >= 25){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-warning w-25"
        }else if(SNR < 25 && SNR >= 20){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-danger w-20"
        }else if(SNR < 20 && SNR >= 15){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-danger w-15"
        }else if(SNR < 15 && SNR >= 10){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-danger w-10"
        }else if(SNR < 10 && SNR >= 5){
            document.getElementById("SNRDigit").innerHTML=SNR
            document.getElementById("SNRBar").className="progress-bar progress-bar-danger w-5"
        }else{
            document.getElementById("SNRDigit").innerHTML=0
            document.getElementById("SNRBar").className="progress-bar progress-bar-danger w-0"
        }
    })
});
}

,100)


//Signal Strength 
setInterval(function(){fetch('https://api.thingspeak.com/channels/1078947/fields/2.json?results=2')
.then((response) => { 
    return response.json().then((data) => {
        console.log(data.feeds[1].field2);
        const sss = data.feeds[1].field2
        if(sss == 100){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-primary w-100"
        }else if(sss < 100 && sss >= 95){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-primary w-95"
        }else if(sss < 95 && sss >= 90){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-primary w-90"
        }else if(sss < 90 && sss >= 85){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-primary w-85"
        }else if(sss < 85 && sss >= 80){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-info w-80"
        }else if(sss < 80 && sss >= 75){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-info w-75"
        }else if(sss < 75 && sss >= 70){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-info w-70"
        }else if(sss < 70 && sss >= 65){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-info w-65"
        }else if(sss < 65 && sss >= 60){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-success w-60"
        }else if(sss < 60 && sss >= 55){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-success w-55"
        }else if(sss < 55 && sss >= 50){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-success w-50"
        }else if(sss < 50 && sss >= 45){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-success w-45"
        }else if(sss < 45 && sss >= 40){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-warning w-40"
        }else if(sss < 40 && sss >= 35){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-warning w-35"
        }else if(sss < 35 && sss >= 30){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-warning w-30"
        }else if(sss < 30 && sss >= 25){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-warning w-25"
        }else if(sss < 25 && sss >= 20){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-danger w-20"
        }else if(sss < 20 && sss >= 15){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-danger w-15"
        }else if(sss < 15 && sss >= 10){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-danger w-10"
        }else if(sss < 10 && sss >= 5){
            document.getElementById("SSSDigit").innerHTML=sss
            document.getElementById("SSSBar").className="progress-bar progress-bar-danger w-5"
        }else{
            document.getElementById("SSSDigit").innerHTML=0
            document.getElementById("SSSBar").className="progress-bar progress-bar-danger w-0"
        }
    })
});
}
,100)


//IQAScore
setInterval(function(){fetch('https://api.thingspeak.com/channels/1078947/fields/4.json?results=2')
.then((response) => { 
    return response.json().then((data) => {
        console.log(data.feeds[1].field4);
        const IQA = data.feeds[1].field4
        if(IQA == 100){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-primary w-100"
        }else if(IQA < 100 && IQA >= 95){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-primary w-95"
        }else if(IQA < 95 && IQA >= 90){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-primary w-90"
        }else if(IQA < 90 && IQA >= 85){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-primary w-85"
        }else if(IQA < 85 && IQA >= 80){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-info w-80"
        }else if(IQA < 80 && IQA >= 75){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-info w-75"
        }else if(IQA < 75 && IQA >= 70){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-info w-70"
        }else if(IQA < 70 && IQA >= 65){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-info w-65"
        }else if(IQA < 65 && IQA >= 60){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-success w-60"
        }else if(IQA < 60 && IQA >= 55){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-success w-55"
        }else if(IQA < 55 && IQA >= 50){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-success w-50"
        }else if(IQA < 50 && IQA >= 45){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-success w-45"
        }else if(IQA < 45 && IQA >= 40){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-warning w-40"
        }else if(IQA < 40 && IQA >= 35){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-warning w-35"
        }else if(IQA < 35 && IQA >= 30){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-warning w-30"
        }else if(IQA < 30 && IQA >= 25){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-warning w-25"
        }else if(IQA < 25 && IQA >= 20){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-danger w-20"
        }else if(IQA < 20 && IQA >= 15){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-danger w-15"
        }else if(IQA < 15 && IQA >= 10){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-danger w-10"
        }else if(IQA < 10 && IQA >= 5){
            document.getElementById("IQADigit").innerHTML=IQA
            document.getElementById("IQABar").className="progress-bar progress-bar-danger w-5"
        }else{
            document.getElementById("IQADigit").innerHTML=0
            document.getElementById("IQABar").className="progress-bar progress-bar-danger w-0"
        }
    })
});
}

,100)




