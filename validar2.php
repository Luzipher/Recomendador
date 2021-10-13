<?php
         $con = new SQLite3("animes.db") or die("problemas para conectar");
         $cs = $con -> query("SELECT * FROM vista1 WHERE comodin LIKE '%$buscador%'");
          while($res = $cs -> fetchArray()) {
            $numero= $res['numero'];
            $nombre = $res['nombre'];
            $categoria= $res['categoria'];
            $episodios= $res['numeroE'];
            $temporadas= $res['temporadas'];
            $recomendador= $res['recomendador'];
            $estrellas=$res['estrellas'];
            $sinposis=$res['sinopsis'];
             echo'  
             <div class="fondo">
             <div class="cajaN">
                 <p>'.$nombre.'</p>
             </div>
             <div class="cajaC">
                 <p>'.$categoria.'</p>
             </div>
             <div class="cajaE">
                 <p>'.$episodios.'</p>
             </div>
             <div class="cajaT">
                 <p>'.$temporadas.'</p>
             </div>
             <div class="cajaR">
                 <p>'.$recomendador.'</p>
             </div>
             <div class="cajaES">
                 <p>'.$estrellas.'</p>
             </div>
             <div class="cajaS">
                 <p>'.$sinposis.'</p>
             </div>
             <div class="cajaIm">
                 <video controls  width="450">
                    <source src="vid/'.$numero.'.mp4" type="video/mp4">
                </video>
             </div>
             </div>
             ';
                
            }
            $con -> close();
        ?>