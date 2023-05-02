class PollingChat {

    constructor() {
        this.idSession = document.getElementById("idSession").value;
        this.chat = document.getElementById("chat");
        this.pengirim = document.getElementById("pengirim").value;
        this.no = 0;
        
    }
    // Method untuk mengubah nilai properti
    setMyProperty(value) {
        this.no = value;
    }

    appendTeks(teks,nama) {
        var text            = document.createTextNode(teks);
        var paragraf        = document.createElement('p');
        var strong          = document.createElement('strong');
        strong.innerText    = nama + " : ";
        paragraf.appendChild( strong );
        paragraf.appendChild(text);
        paragraf.classList.add('m-3');
        let div = document.createElement('div');
        div.appendChild(paragraf);
        div.classList.add('border')
        this.chat.appendChild(div);
    }

    pollData() 
    {
        const self = this;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax ({

            url: 'poll',
            type: 'GET',
            data: { 
                idSesi:     self.idSession,
                sessionNol: self.no
            },
            
            success: function(response) {
                // let no = response[(response.length) - 1]["no"];
               
                for (let i = 0; i < response.length ; i++) {
                    self.setMyProperty(response[i]['no']);
                    self.appendTeks(response[i]['pesan'],response[i]['pengirim']);
                }
                // if ( self.no < no ) {
                //     
                //     // 
                //     //    
                //     //     console.log(response[i]["no"]+' : '+response[i]["pesan"]);
                //     // }
                // }},
            // complete: function() {
            //     // Lakukan polling lagi setelah 2 detik
            //     setInterval(function(){self.pollData}, 5000);
            // 
            }
        });  
    }

    start()
    {
        this.fetchInterval = setInterval(() => {
            this.pollData();
        }, 2000);
    }

}


function pushData() {
    let text = $("#pesan").val()
    let idSesi = document.getElementById("idSession").value;
    let pengirim = document.getElementById("pengirim").value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : "push",
        type : 'POST',
        data : { 
            pesan    :text,
            id       :idSesi,
            pengirim : pengirim
        },

        success: function(response) {
            console.log(response);
        },

        error: function(response) {
            console.log(response);
        }
    })
};

$("#chat-submit").click( function(){ pushData() } );
let polling = new PollingChat();
polling.start();