<script>
    let slideIndex = [1,1];
    function Move(n, no) {
        var slideclass = ["BtnMatch","BtnJoueurs"];
        let i;
        var x = document.getElementsByName(slideclass[no]);
        if (x.length > 7) { 
            if(no == 0){var k = 15;}else{var k = 17;}
            if (n > 0) {
                myMove(k,no);
            } else if (n < 0) {
                myMove(-k,no);
            } 
        }
    }
    function myMove(n, no) {
        var slideclass = ["BtnMatch","BtnJoueurs"];
        var slideId = ["S-main-accueil-MatchePrecedents-BtnMatch-premier","S-main-accueil-MeilleursJoueurs-BtnJoueurs-premier"];
        const elem = document.getElementById(slideId[no]); 
        let mli = elem.style.getPropertyValue("margin-left").search(/px/);
        if (mli>0){

            slideIndex[no] = Number.parseInt(elem.style.getPropertyValue("margin-left").slice(0,mli)) + (n*10);
        }else{
            slideIndex[no] = elem.style.getPropertyValue("margin-left") + (n*10);
        }

        var x = document.getElementsByName(slideclass[no]).length - 7;
        let minPos = 0;
        if (x > 0){
            if(minPos<=0){minPos=n*x*10;}
            if(minPos>0){minPos=-n*x*10;}
        }

        if ((minPos<=slideIndex[no]) & (slideIndex[no]<=0)){
            let id = null;
            clearInterval(id);
            let pos = 0+(slideIndex[no]-(n*10)); 
            id = setInterval(frame, 5); 
            function frame() {
                if (pos == slideIndex[no]) {
                    clearInterval(id); 
                } else {
                    pos+=n; 
                    elem.style.marginLeft = pos + "px"; 
                }
            }
        }
    }
</script>