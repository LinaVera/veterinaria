var imagenes=['../IMAGENES/zz_1.jpg','../IMAGENES/zz_2.jpg','../IMAGENES/zz_4.png','../IMAGENES/zz_8.jpg','../IMAGENES/zz_5.jpg','../IMAGENES/zz_7.jpg','../IMAGENES/zz_9.jpg','../IMAGENES/zz_10.jpg'],
cont=0;

function carrousel(contenedor){
    contenedor.addEventListener('click', e => {
        let atras = contenedor.querySelector('.atras'),
            adelante=contenedor.querySelector('.adelante'),img = contenedor.querySelector('img'),
            tgt = e.target;

if(tgt == atras){
    if (cont > 0) {
        img.src = imagenes[cont - 1];
        cont--;
    }else{
        img.src= imagenes[imagenes.length - 1];
        cont= imagenes.length - 1;
    }

}else if(tgt == adelante){
    if(cont < imagenes.length - 1 ){
        img.src = imagenes[cont + 1];
        cont++;
    }else{
        img.src= imagenes[0];
        cont= 0;

    }

}
    });
}

document.addEventListener("DOMContentLoaded", () => {
    let contenedor = document.querySelector('.contenedor');

    carrousel(contenedor);
} );
