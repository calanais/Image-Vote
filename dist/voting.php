<!DOCTYPE html>
<html lang="en">
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>BWPS Junior Competition 2017</title>

   <meta name="viewport" content="width=device-width, initial-scale=1">

   <link href="./lib/tentcss/tent.min.css" rel="stylesheet"/>
   <link href="./lib/lightbox2/css/lightbox.css" rel="stylesheet">
   <link href="//fonts.googleapis.com/css?family=Roboto+Slab:400,700%7CRoboto:400,700,700italic,400italic" rel="stylesheet" type="text/css">
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
   <header class="masthead bg-color-primary inverse padding-y padding-xs">
       <div class="container">
           <div class="grid grid--center">
               <div class="grid__column">

                   <?php
                     // get the section that is being handled
                     $section = $_GET['section'];
                     if ($section == 'primary'){
                        $section = 'primary';
                        $link = 'secondary';
                     } else {
                        $section = 'secondary';
                        $link= 'primary';
                     }
                   ?>
                   <div class="title-set"/>
                   <h1 class="title title--xl">BWPS Junior Competition - <?php echo ucfirst($section) ?> Section </h1>
                   <?php
                   echo "<a href=\"./voting.php?section=$link\" ><h1 class=\"subtitle subtitle--lg\">Switch to " .
                    ucfirst($link) . " section</h1></a>"; ?>
                </div>
               </div>
           </div>
       </div>
   </header>

<main class="mastcontent">
    <section class="intro-copy padding-y padding-lg">
        <div class="container">

           <div class="grid">
                 <div class="grid__column grid__column--3 ">
                    <div class="card">
                        1st
                        <div class="card__content">
                           <span id="first"></span>
                        </div>
                    </div>
                 </div>
                      <div class="grid__column grid__column--3 ">

                    <div class="card">
                        2nd
                        <div class="card__content">
                           <span id="second"></span>
                        </div>
                    </div>
                    </div>
                    <div class="grid__column grid__column--3 ">
                    <div class="card">
                       3rd
                       <div class="card__content">
                           <span id="third"></span>
                       </div>
                    </div>
                 </div>
                 <div class="grid__column grid__column--3 ">
                    <div class="card">
                       HC
                       <div class="card__content">
                           <span id="hc1"></span>
                       </div>
                    </div>
                 </div>
                 <div class="grid__column grid__column--3 ">
                    <div class="card">
                       HC
                       <div class="card__content">
                           <span id="hc2"></span>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
</div>
           <div class="container">

            <div class="grid">
                <div class="grid__column grid__column--12 grid__column--12--md ">
                   <div class="grid ">
                   <?php
                   $files = glob('./'.$section.'/*.[jJ][pP][gG]');

                    array_walk($files, 'test_print');

                    function test_print($item2, $key)
                    {
                       $startp = strripos($item2,'/');
                       $length = strripos($item2,'.')-$startp;
                       $imgtitle = substr($item2, $startp+1,$length-1);
                       echo "<div class=\"grid__column grid__column--12 grid__column--4--md  grid--justify-center \">";
                       echo "<div class=\"card grid--justify-center\">";
                       echo "<a href=\"$item2\" data-lightbox=\"PrimaryAge\" data-title=\"$item2\" ><img width=\"300\" src=\"$item2\" class=\"grid--justify-center   example-image\"></img></a>\n";
                       echo "<div class=\"card__content\"><span class=\"type-bold\">$imgtitle</span>".
                       "<div class=\"control control--block control--select\">".
   "<select class=\"control__select\" id=\"$imgtitle-$key\">".
    "<option value=\"0\">--</option>".
       "<option value=\"1\" >1st</option>".
       "<option value=\"2\">2nd</option>".
       "<option value=\"3\">3rd</option>".
       "<option value=\"H\">HC</option>".
   "</select></div>".
                          "</div></div>";
                       echo "</div>";
                    }

                   ?>

                   </div>
                </div>

            </div>
        </div>
    </section>
</main>


<script src="./lib/lightbox2/js/lightbox.min.js"></script>
</body>

<script>
$(document).ready(function(){
   $(".control__select").change(function(event){
      let vote = $(event.target).find(":selected").val();
      console.log(event.target.id + ' '+vote);
      if (vote === '1'){
         let id = $("#first").text();
         console.log(id);
         if (id !=="") $("#" + id).val('0');
         $("#first").text(event.target.id);
      }
   })
   // jQuery methods go here...

});
</script>

</html>
