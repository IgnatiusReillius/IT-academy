# kata-pub

**Kata 64 para la especialidad fullstack PHP 18-9-25**

Un bar de copas tiene mesas para clientes:

Cada mesa tiene:

* Un número identificador
* Un número de sillas
* Un indicador de si ya está reservada o no.

Imagínate que eres un cliente que quiere hacer una reserva en este bar. Para ello, deberemos indicar:

* Nombre de la reserva
* Cantidad de personas

Crea un programa que represente toda esta información y lógicas propuestas.

**Mis comentarios**

En su momento no subí mi versión de lo que hice en media hora porque no conseguí nada funcional.
Mi idea inicial era tener 3 clases: 
    - la del bar/pub, que se encargaba del proceso de reserva. Esto es presentarse (ya que consideré que podías escoger entre una serie de bares), pedir el número de personas, comprobar si de las mesas NO reservadas que tenía había una con suficientes sillas, en cuyo caso afirmativo pedía el nombre y se lo asignaba a la mesa mientras la reservaba, y en caso contrario lo comunicaba. Básicamente no ha cambiado casi nada la idea original con la final. Sí que quité dos de los 3 arrays que había pensado inicialmente,el array de "mesas ocupadas" y "mesas reservadas", ya que consideraba que había diferencias entre reservada y ocupada y se podía usar, pero para lo que se pedía era innecesario.
    - la de mesa, que tenía un número identificativo, un número de sillas, un booleano para "está reservada" y otro para "está ocupada". Sus funciones principales serían las de comunicar si estaba ya reservada, comparar el número de sillas con el de personas, y pasar a reservada. Lo único que terminé quitando fue la variable "mesa ocupada", por los mismos motivos de antes.
    - la de cliente, que sería el encargado de iniciar la reserva en el bar que quisiera, y tendría los atributos de nombre (que serviría para la reserva), y el número de personas. Pero esto resultaba en una kata nada interactiva en el que todo el proceso se reproducía de principio a fin sin requerir nada por terminal, por lo que terminé quitándola.