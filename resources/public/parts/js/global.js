$(document).ready(function(){
$(".open_x").click(function(j) {
             $.ajax({
                 type: "POST",
                  url: urlweb+'/tema/tema1/parts/act/get.data.galery.php',
                  dataType:"json",
                  traditional: true,
                  data: { data: $(this).attr('id') },
                   success: function(html){
                          $.fancybox(html,
                            {
                               
                                allowfullscreen   : 'true',
                                'openEffect'    :   'elastic',
                                'closeEffect'   :   'elastic',
                                'nextEffect'    :   'fadeIn',
                                'openSpeed'     :   500, 
                                'closeSpeed'    :   300,
                                close  : [27], // escape key
                                play   : [32], // space - start/stop slideshow
                                toggle : [70],  // letter "f" - toggle fullscreen
                                next : {
                                    13 : 'left', // enter
                                    34 : 'up',   // page down
                                    39 : 'left', // right arrow
                                    40 : 'up'    // down arrow
                                },
                                prev : {
                                    8  : 'right',  // backspace
                                    33 : 'down',   // page up
                                    37 : 'right',  // left arrow
                                    38 : 'down'    // up arrow
                                },
                                helpers    : {
                                media : {},
                                title : {
                                    type: 'over'  
                                },
                                thumbs : {
                                    width  : 75,
                                    height : 50,
                                    source : function( item ) {
                                        return item.href.replace('_b.jpg', '_s.jpg');
                                    }
                                }
                            }
                            });
                        }
                });
            return false;
        });  

  /*
  jquery form script
   */
  //customize values to suit your needs.
  var max_file_size     = 8048576; //maximum allowed file size
  var allowed_file_types  = ['image/jpeg', 'image/pjpeg']; //allowed file types
  //var message_output_el   = 'output'; //ID of an element for response output
  //var loadin_image_el   = 'loading-img'; //ID of an loading Image element

  //You may edit below this line but not necessarily
  var options = { 
    //dataType:  'json', //expected content type
    //target: '#' + message_output_el,   // target element(s) to be updated with server response 
    beforeSubmit: before_submit,  // pre-submit callback 
    success: after_success,  // post-submit callback 
    resetForm: true        // reset the form after successful submit 
  }; 

  $('#pengaduan').submit(function(){
    $(this).ajaxSubmit(options); //trigger ajax submit
    return false; //return false to prevent standard browser submit
  });

  function before_submit(formData, jqForm, options){
    NProgress.inc(0,3);
    var proceed = true;
    var error = []; 
    $(formData).each(function(){  
      //check invalid file types and maximum size of a file
      if(this.type == "file"){
        if(window.File && window.FileReader && window.FileList && window.Blob){
          if(this.value !== ""){
            if(allowed_file_types.indexOf(this.value.type) === -1){
              error.push( "<b>"+ this.value.type + "</b> is unsupported file type!");
              proceed = false;
            }
            //allowed file size. (1 MB = 1048576)
            if(this.value.size > max_file_size){ 
              error.push( "<b>"+ bytes_to_size(this.value.size) + "</b> is too big! Allowed size is " + bytes_to_size(max_file_size));
              proceed = false;
            }
          }
        }else{
          error.push( "Please upgrade your browser, because your current browser lacks some new features we need!");
          proceed = false;
        }
      }
      
    }); 
    
    $(error).each(function(i){ //output any error to element
      //$('#' + message_output_el).html('<div class="error">'+error[i]+"</div>");
      // showMessage('danger','Error',error[i],'fa fa-ban');
      alert('error');
    }); 
    
    if(!proceed){
      NProgress.done();
      return false;
    }
    
    //$('#' + loadin_image_el).show();
  }

  //Callback function after success
  function after_success(data){
    // alert(data);
    NProgress.done();
    switch(data){
      case "1" : {
        $('#divalert').html("<div class='alert alert-success' role='alert'><i class='fa fa-fw fa-check-square-o'></i> Pengaduan berhasil dikirim.</div>");
      }
        break;
      case "0" : {
        $('#divalert').html("<div class='alert alert-danger' role='alert'><i class='fa fa-fw fa-exclamation-triangle'></i> Pengaduan gagal dikirim, silakan periksa kembali data anda.</div>");
      }
        break;
    }
  }

  //Callback function to format bites bit.ly/19yoIPO
  function bytes_to_size(bytes){
     var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
     if (bytes == 0) return '0 Bytes';
     var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
     return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
  }   
  
  $('#btnPengaduan').click(function(){
    if ($.trim($('#nama').val())&&$.trim($('#tlp').val())&&$.trim($('#bidang').val())&&$.trim($('#perihal').val())&&$.trim($('#isipengaduan').val())) {
      $('#pengaduan').submit();
    }else{
      // showMessage('warning', 'Perhatian', 'Semua field harus diisi.', 'fa fa-exclamation');
      $('#divalert').html("<div class='alert alert-warning' role='alert'><i class='fa fa-fw fa-exclamation-circle'></i> Harap lengkapi semua data.</div>");
    }
  });

  $('#addKomen').click(function(){
    if ($.trim($('#nama').val())&&$.trim($('#email').val())&&$.trim($('#comment').val())) {
      NProgress.inc(0.3);
      if(validateEmail($('#email').val())){
        var myData = {nama : $('#nama').val(), email : $('#email').val(), komentar : $('#comment').val(), idberita : $('#idberita').val(), mode : "add"}; //post variables
        $.ajax({
          type: "POST",
          url: urlweb+"/tema/tema1/parts/act/act.komentar.php",
          data: myData,
          success:function(result){
            //alert(result);
            switch(result){
              case "1" : {
                // alert("sukses");
                  $('#divalert').html("<div class='alert alert-success' role='alert'><i class='fa fa-fw fa-check-square-o'></i> Komentar berhasil ditambahkan.</div>");
              }
                break;
              case "0" : {
                //alert("Gagal");
                  showMessage('danger','Perhatian','Komentar gagal ditambahkan., silahkan periksa data anda dan dicoba kembali.','fa fa-ban');
                  $('#divalert').html("<div class='alert alert-danger' role='alert'><i class='fa fa-fw fa-exclamation-triangle'></i> Komentar gagal ditambahkan., silahkan periksa data anda dan dicoba kembali.</div>");
              }
              break;
            }
          },
          error:function (xhr, ajaxOptions, thrownError){
            NProgress.done();
            alert(thrownError); //throw any errors
          },
          complete:function (){
            NProgress.done();
            $('#nama').val('');
            $('#email').val('');
            $('#comment').val('');
          }
        });
        NProgress.done();
      }else{
        // alert('Format alamat email tidak sesuai, silahkan periksa kembali.');
        $('#divalert').html("<div class='alert alert-warning' role='alert'><i class='fa fa-fw fa-exclamation-circle'></i> Format alamat email tidak sesuai, silahkan periksa kembali.</div>");
        NProgress.done();
      }
    }else{
      // showMessage('warning', 'Perhatian', 'Semua field harus diisi.', 'fa fa-exclamation');
      $('#divalert').html("<div class='alert alert-warning' role='alert'><i class='fa fa-fw fa-exclamation-circle'></i> Harap lengkapi semua data.</div>");
    }
  });

});

var urlweb = $('.logo.navbar-brand a').prop('href');

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function resizeIframe(){
  $("iframe").attr({
    'width':'100%',
    'height': '450'
  });
}

function hitungKomentar(){
  var myData = {idberita : $('#idberita').val(), mode : "hitung"}; //post variables
  $.ajax({
      type: "POST",
      cache: false,
      url: urlweb+"/tema/tema1/parts/act/act.komentar.php",
      data: myData,
      success:function(result){
          $('#jmlkomen').html(result+' Komentar');
          $('#jmlkomenhead').html(result+' Komentar');
      },
      error:function (xhr, ajaxOptions, thrownError){
        alert(thrownError); //throw any errors
      }
    });   
}

function getMap(){
  $.ajax({
      type: "POST",
      cache: false,
      url: urlweb+"/tema/tema1/parts/act/act.map.php",
      success:function(result){
        if (result.substr(0,1)!='&') {
            var htmlstr = "<img src='"+urlweb+"/upload/image/"+result+"' style='display: block; max-width: 100%; max-height: 450px;  width: auto; height: auto;'/>";
            $('#dvpeta').html(htmlstr);
          }else{
            embed = reescapeHtml(result);
            $('#dvpeta').html(embed);
            resizeIframe();
          }
      },
      error:function (xhr, ajaxOptions, thrownError){
        alert(thrownError); //throw any errors
      }
    });   
}

function reescapeHtml(text) {
  var map = {
    '&amp;': '&',
    '&lt;': '<',
    '&gt;': '>',
    '&quot;': '"',
    '&#039;': "'",
  '&nbsp;': ' '
  };

  return text.replace(/&#039;|&amp;|&quot;|&lt;|&gt;|&nbsp;/g, function(m) { return map[m]; });
}