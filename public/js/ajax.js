class PollingChat {

    constructor() {
        this.chat = document.getElementById("chat");
        this.no = 0;
        
    }
    // Method untuk mengubah nilai properti
    setMyProperty(value) {
        this.no = value;
    }

    appendTeks(teks,nama) {
        let text        = document.createTextNode(teks);
        let paragraf    = document.createElement('p');
        let bold        = document.createElement('b');
        let small       = document.createElement('small');
        let br          = document.createElement('br');
        let div = document.createElement('div');
        small.innerText = nama;
        bold.appendChild(small);
        paragraf.appendChild(text);
        paragraf.classList.add('m-0');
    
        div.appendChild(bold);
        div.appendChild(paragraf);
        div.classList.add('card','my-1','mx-3','p-2')
        this.chat.appendChild(div);
    }

    pollData(url) 
    {
        const self = this;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax ({

            url: url,
            type: 'POST',
            data: { 
                sessionNol: self.no
            },
            
            success: function(response) {
               
                for (let i = 0; i < response.length ; i++) {
                    self.setMyProperty(response[i]['no']);
                    self.appendTeks(response[i]['pesan'],response[i]['username_pengirim']);
                }
            }
        });  
    }

    start(url)
    {
        this.fetchInterval = setInterval(() => {
            this.pollData(url);
        }, 2000);
    }

}


function pushData($url) {
    let text = $("#pesan").val()
    let idSesi = document.getElementById("idSession").value;
    let pengirim = document.getElementById("pengirim").value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : "tes",
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