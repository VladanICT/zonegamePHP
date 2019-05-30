window.onload=function(){
    prikaziPitanja();
 
    
   
}
 
function prikaziPitanja(){
 
    $.ajax({
        url:"php/prikazAnkete.php",
        method:"POST",
        type:"json",
        data:{
            fill:1,
        },
        success:function(data){
            var data=$.parseJSON(data);
            console.log(data);
 
            let ispis=`<select id="drop" class="form-control"><option value="0">Izaberite jednu od aktivnih anketa..</option>`;
            data.forEach(d => {
                ispis+=`<option name="question" value="${d.id_ankete}">${d.pitanje}</option>`;
                 
            });
            ispis+=`</select>`;
            document.getElementById("anketa").innerHTML=ispis;
            document.getElementById("drop").addEventListener("change",function(){
                prikaziOdgovore(this.value);
            })
        }
    });
}
 
function prikaziOdgovore(id){
 
    $.ajax({
        url:"php/prikazOdgovora.php",
        method:"POST",
        type:"json",
        data:{
            pill:1,
        },
        success:function(data){
            var data=$.parseJSON(data);
            console.log(data);
            console.log(id);
 
            data=data.filter(x=>x.id_ankete==id);
              let ispis=`<form method="POST"><input type="text" name="question" value="${id}" hidden>`;
            data.forEach(i=>{
               ispis+=`<input type="radio" value="${i.id_odgovori}" name="odgovor" class="odgovor">${i.odgovori}<br/>`;
            });
            ispis+=`<tr><td><input type='submit' name="glasaj" id='glasaj' value='Glasaj' class="btn btn-primary"/></td></tr>
            <tr><td><input type='submit' id='rez' value='Rezultati' class="btn btn-primary"/></td></tr>
            </table></form>`;
           
            document.getElementById("odgovori").innerHTML=ispis;
        }
    });
}

// $("#glasaj").click(function(){
//     $.ajax({
//         url: "php/store_answer.php",
//         method: "POST"
//     });
// });