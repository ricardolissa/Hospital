<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas')->insert([

            'nombre'           => 'Mauro',
            'apellido'         => 'Aguilar',
            'dni'              => '36666666',
            'email'            => 'MauroAguilar@medicos.com.ar',
            'fecha_nacimiento' => '26/03/90',
            'edad'             => '30',
        ]); //

        DB::table('personas')->insert([

            'nombre'           => 'Anabel',
            'apellido'         => 'Alcoba',
            'dni'              => '32654731',
            'email'            => 'AnabelAlcoba@medicos.com.ar',
            'fecha_nacimiento' => '31/03/70',
            'edad'             => '50',
        ]); //

        DB::table('personas')->insert(['nombre' => 'Federico', 'apellido' => 'Alegre', 'dni' => '30564879', 'email' => 'FedericoAlegre@medicos.com.ar', 'fecha_nacimiento' => '23/03/00', 'edad' => '20']); //
        DB::table('personas')->insert(['nombre' => 'Luciana', 'apellido' => 'Alterach', 'dni' => '36979521', 'email' => 'LucianaAlterach@medicos.com.ar', 'fecha_nacimiento' => '30/03/75', 'edad' => '45']); //
        DB::table('personas')->insert(['nombre' => 'Alejandra', 'apellido' => 'Ampuero', 'dni' => '38010621', 'email' => 'AlejandraAmpuero@medicos.com.ar', 'fecha_nacimiento' => '25/03/92', 'edad' => '28']); //
        DB::table('personas')->insert(['nombre' => 'Silvina', 'apellido' => 'Ampuero', 'dni' => '39033721', 'email' => 'SilvinaAmpuero@medicos.com.ar', 'fecha_nacimiento' => '24/03/99', 'edad' => '21']); //
        DB::table('personas')->insert(['nombre' => 'Carlos', 'apellido' => 'Andrada', 'dni' => '40056821', 'email' => 'CarlosAndrada@medicos.com.ar', 'fecha_nacimiento' => '26/03/90', 'edad' => '30']); //
        DB::table('personas')->insert(['nombre' => 'Cecilia', 'apellido' => 'Apaza', 'dni' => '41079921', 'email' => 'CeciliaApaza@medicos.com.ar', 'fecha_nacimiento' => '26/03/88', 'edad' => '32']); //
        DB::table('personas')->insert(['nombre' => 'Luis', 'apellido' => 'Aracena', 'dni' => '42103021', 'email' => 'LuisAracena@medicos.com.ar', 'fecha_nacimiento' => '27/03/85', 'edad' => '35']); //
        DB::table('personas')->insert(['nombre' => 'Mariana', 'apellido' => 'Armanini', 'dni' => '43126121', 'email' => 'MarianaArmanini@medicos.com.ar', 'fecha_nacimiento' => '28/03/82', 'edad' => '38']); //
        DB::table('personas')->insert(['nombre' => 'Alejandro', 'apellido' => 'Benitez', 'dni' => '44149221', 'email' => 'AlejandroBenitez@medicos.com.ar', 'fecha_nacimiento' => '07/04/40', 'edad' => '80']); //
        DB::table('personas')->insert(['nombre' => 'Maria', 'apellido' => 'Boniface', 'dni' => '45172321', 'email' => 'MariaBoniface@medicos.com.ar', 'fecha_nacimiento' => '01/04/64', 'edad' => '56']); //
        DB::table('personas')->insert(['nombre' => 'Gimena', 'apellido' => 'Bossio', 'dni' => '46195421', 'email' => 'GimenaBossio@medicos.com.ar', 'fecha_nacimiento' => '29/03/76', 'edad' => '44']); //
        DB::table('personas')->insert(['nombre' => 'Andrea', 'apellido' => 'Brond', 'dni' => '47218521', 'email' => 'AndreaBrond@medicos.com.ar', 'fecha_nacimiento' => '01/04/65', 'edad' => '55']); //
        DB::table('personas')->insert(['nombre' => 'Rodrigo', 'apellido' => 'Burgos', 'dni' => '48241621', 'email' => 'RodrigoBurgos@medicos.com.ar', 'fecha_nacimiento' => '30/03/74', 'edad' => '46']); //
        DB::table('personas')->insert(['nombre' => 'Camila', 'apellido' => 'Cajal', 'dni' => '49264721', 'email' => 'CamilaCajal@medicos.com.ar', 'fecha_nacimiento' => '29/03/77', 'edad' => '43']); //
        DB::table('personas')->insert(['nombre' => 'Maria', 'apellido' => 'Calderon', 'dni' => '50287821', 'email' => 'MariaCalderon@medicos.com.ar', 'fecha_nacimiento' => '29/03/78', 'edad' => '42']); //
        DB::table('personas')->insert(['nombre' => 'Hector', 'apellido' => 'Canete', 'dni' => '51310921', 'email' => 'HectorCanete@medicos.com.ar', 'fecha_nacimiento' => '29/03/79', 'edad' => '41']); //
        DB::table('personas')->insert(['nombre' => 'Marina', 'apellido' => 'Carrizo', 'dni' => '52334021', 'email' => 'MarinaCarrizo@medicos.com.ar', 'fecha_nacimiento' => '28/03/80', 'edad' => '40']); //
        DB::table('personas')->insert(['nombre' => 'Matias', 'apellido' => 'Carrizo', 'dni' => '53357121', 'email' => 'MatiasCarrizo@medicos.com.ar', 'fecha_nacimiento' => '28/03/81', 'edad' => '39']); //
        DB::table('personas')->insert(['nombre' => 'Lujan', 'apellido' => 'Catari', 'dni' => '54380221', 'email' => 'LujanCatari@medicos.com.ar', 'fecha_nacimiento' => '28/03/82', 'edad' => '38']); //
        DB::table('personas')->insert(['nombre' => 'Agustina', 'apellido' => 'Champa', 'dni' => '55403321', 'email' => 'AgustinaChampa@medicos.com.ar', 'fecha_nacimiento' => '28/03/83', 'edad' => '37']); //
        DB::table('personas')->insert(['nombre' => 'Gaston', 'apellido' => 'Chilemi', 'dni' => '56426421', 'email' => 'GastonChilemi@medicos.com.ar', 'fecha_nacimiento' => '27/03/84', 'edad' => '36']); //
        DB::table('personas')->insert(['nombre' => 'Cristian', 'apellido' => 'Chillemi', 'dni' => '57449521', 'email' => 'CristianChillemi@medicos.com.ar', 'fecha_nacimiento' => '28/03/82', 'edad' => '38']); //
        DB::table('personas')->insert(['nombre' => 'Virginia', 'apellido' => 'Chorolque', 'dni' => '58472621', 'email' => 'VirginiaChorolque@medicos.com.ar', 'fecha_nacimiento' => '28/03/81', 'edad' => '39']); //
        DB::table('personas')->insert(['nombre' => 'Federico', 'apellido' => 'Cisnero', 'dni' => '59495721', 'email' => 'FedericoCisnero@medicos.com.ar', 'fecha_nacimiento' => '28/03/81', 'edad' => '39']); //
        DB::table('personas')->insert(['nombre' => 'Nadia', 'apellido' => 'Colombres', 'dni' => '32254731', 'email' => 'NadiaColombres@medicos.com.ar', 'fecha_nacimiento' => '01/04/64', 'edad' => '56']); //
        DB::table('personas')->insert(['nombre' => 'Natalia', 'apellido' => 'Conti', 'dni' => '32598308', 'email' => 'NataliaConti@medicos.com.ar', 'fecha_nacimiento' => '07/04/42', 'edad' => '78']); //
        DB::table('personas')->insert(['nombre' => 'Javier', 'apellido' => 'Cuevas', 'dni' => '32541885', 'email' => 'JavierCuevas@medicos.com.ar', 'fecha_nacimiento' => '02/04/60', 'edad' => '60']); //
        DB::table('personas')->insert(['nombre' => 'Facundo', 'apellido' => 'Duarte', 'dni' => '32485462', 'email' => 'FacundoDuarte@medicos.com.ar', 'fecha_nacimiento' => '03/04/59', 'edad' => '61']); //
        DB::table('personas')->insert(['nombre' => 'Maria', 'apellido' => 'Escobar', 'dni' => '32429039', 'email' => 'MariaEscobar@administrativo.com.ar', 'fecha_nacimiento' => '03/04/58', 'edad' => '62']); //
        DB::table('personas')->insert(['nombre' => 'Alfredo', 'apellido' => 'Espinola', 'dni' => '32372616', 'email' => 'AlfredoEspinola@administrativo.com.ar', 'fecha_nacimiento' => '03/04/57', 'edad' => '63']); //
        DB::table('personas')->insert(['nombre' => 'Magali', 'apellido' => 'Farias', 'dni' => '32316193', 'email' => 'MagaliFarias@administrativo.com.ar', 'fecha_nacimiento' => '25/03/95', 'edad' => '25']); //
        DB::table('personas')->insert(['nombre' => 'Hugo', 'apellido' => 'Farias', 'dni' => '32259770', 'email' => 'HugoFarias@administrativo.com.ar', 'fecha_nacimiento' => '23/03/02', 'edad' => '18']); //
        DB::table('personas')->insert(['nombre' => 'Rodolfo', 'apellido' => 'Fernandez', 'dni' => '32203347', 'email' => 'RodolfoFernandez@administrativo.com.ar', 'fecha_nacimiento' => '23/03/01', 'edad' => '19']); //
        DB::table('personas')->insert(['nombre' => 'Rocio', 'apellido' => 'Fuentes', 'dni' => '32146924', 'email' => 'RocioFuentes@administrativo.com.ar', 'fecha_nacimiento' => '23/03/00', 'edad' => '20']); //
        DB::table('personas')->insert(['nombre' => 'Gabriel', 'apellido' => 'Gimenez', 'dni' => '32090501', 'email' => 'GabrielGimenez@administrativo.com.ar', 'fecha_nacimiento' => '24/03/99', 'edad' => '21']); //
        DB::table('personas')->insert(['nombre' => 'Ramiro', 'apellido' => 'Gomez', 'dni' => '32034078', 'email' => 'RamiroGomez@administrativo.com.ar', 'fecha_nacimiento' => '24/03/98', 'edad' => '22']); //
        DB::table('personas')->insert(['nombre' => 'Mauricio', 'apellido' => 'Gonzalez', 'dni' => '31977655', 'email' => 'MauricioGonzalez@administrativo.com.ar', 'fecha_nacimiento' => '24/03/97', 'edad' => '23']); //
        DB::table('personas')->insert(['nombre' => 'Gustavo', 'apellido' => 'Gonzalez', 'dni' => '31921232', 'email' => 'GustavoGonzalez@administrativo.com.ar', 'fecha_nacimiento' => '24/03/96', 'edad' => '24']); //
        DB::table('personas')->insert(['nombre' => 'Ivan', 'apellido' => 'Gonzalez', 'dni' => '31864809', 'email' => 'IvanGonzalez@administrativo.com.ar', 'fecha_nacimiento' => '25/03/95', 'edad' => '25']); //
        DB::table('personas')->insert(['nombre' => 'Ruben', 'apellido' => 'Graziano', 'dni' => '31808386', 'email' => 'RubenGraciano@administrativo.com.ar', 'fecha_nacimiento' => '25/03/94', 'edad' => '26']); //
        DB::table('personas')->insert(['nombre' => 'Fernanda', 'apellido' => 'Grassi', 'dni' => '31751963', 'email' => 'FernandaGrassi@administrativo.com.ar', 'fecha_nacimiento' => '25/03/93', 'edad' => '27']); //
        DB::table('personas')->insert(['nombre' => 'Ruben', 'apellido' => 'Guzman', 'dni' => '31695540', 'email' => 'RubenGuzman@administrativo.com.ar', 'fecha_nacimiento' => '24/03/97', 'edad' => '23']); //
        DB::table('personas')->insert(['nombre' => 'Pablo', 'apellido' => 'Huley', 'dni' => '31639117', 'email' => 'PabloHuley@administrativo.com.ar', 'fecha_nacimiento' => '25/03/92', 'edad' => '28']); //
        DB::table('personas')->insert(['nombre' => 'Alejandro', 'apellido' => 'Iacarino', 'dni' => '31582694', 'email' => 'AlejandroIacarino@onlypaciente.com', 'fecha_nacimiento' => '26/03/91', 'edad' => '29']); //
        DB::table('personas')->insert(['nombre' => 'Daminan', 'apellido' => 'Ibargoyen', 'dni' => '31526271', 'email' => 'DaminanIbargoyen@onlypaciente.com', 'fecha_nacimiento' => '25/03/93', 'edad' => '27']); //
        DB::table('personas')->insert(['nombre' => 'Laura', 'apellido' => 'Insua', 'dni' => '31469848', 'email' => 'LauraInsua@onlypaciente.com', 'fecha_nacimiento' => '25/03/92', 'edad' => '28']); //
        DB::table('personas')->insert(['nombre' => 'Mariano', 'apellido' => 'Lanaro', 'dni' => '31413425', 'email' => 'MarianoLanaro@onlypaciente.com', 'fecha_nacimiento' => '24/03/96', 'edad' => '24']); //
        DB::table('personas')->insert(['nombre' => 'Valentin', 'apellido' => 'Larini', 'dni' => '31357002', 'email' => 'ValentinLarini@onlypaciente.com', 'fecha_nacimiento' => '26/03/91', 'edad' => '29']); //
        DB::table('personas')->insert(['nombre' => 'Nahuel', 'apellido' => 'Lescano', 'dni' => '31300579', 'email' => 'NahuelLescano@onlypaciente.com', 'fecha_nacimiento' => '26/03/90', 'edad' => '30']); //
        DB::table('personas')->insert(['nombre' => 'Sandra', 'apellido' => 'Lescano', 'dni' => '31244156', 'email' => 'SandraLescano@onlypaciente.com', 'fecha_nacimiento' => '31/03/70', 'edad' => '50']); //
        DB::table('personas')->insert(['nombre' => 'Andres', 'apellido' => 'Liset', 'dni' => '31187733', 'email' => 'AndresLiset@onlypaciente.com', 'fecha_nacimiento' => '23/03/00', 'edad' => '20']); //
        DB::table('personas')->insert(['nombre' => 'Ricardo', 'apellido' => 'Lissa', 'dni' => '31131310', 'email' => 'RicardoLissa@onlypaciente.com', 'fecha_nacimiento' => '30/03/75', 'edad' => '45']); //
        DB::table('personas')->insert(['nombre' => 'Gonzalo', 'apellido' => 'Lopez', 'dni' => '31074887', 'email' => 'GonzaloLopez@onlypaciente.com', 'fecha_nacimiento' => '25/03/92', 'edad' => '28']); //
        DB::table('personas')->insert(['nombre' => 'Romina', 'apellido' => 'Lopez', 'dni' => '31018464', 'email' => 'RominaLopez@onlypaciente.com', 'fecha_nacimiento' => '24/03/99', 'edad' => '21']); //
        DB::table('personas')->insert(['nombre' => 'Laura', 'apellido' => 'Maffuci', 'dni' => '39564879', 'email' => 'LauraMaffuci@onlypaciente.com', 'fecha_nacimiento' => '26/03/90', 'edad' => '30']); //
        DB::table('personas')->insert(['nombre' => 'Jorge', 'apellido' => 'Marotto', 'dni' => '31539093', 'email' => 'JorgeMarotto@onlypaciente.com', 'fecha_nacimiento' => '26/03/88', 'edad' => '32']); //
        DB::table('personas')->insert(['nombre' => 'Daniel', 'apellido' => 'Mendoza', 'dni' => '32513307', 'email' => 'DanielMendoza@onlypaciente.com', 'fecha_nacimiento' => '27/03/85', 'edad' => '35']); //
        DB::table('personas')->insert(['nombre' => 'Gabriel', 'apellido' => 'Monzon', 'dni' => '33487521', 'email' => 'GabrielMonzon@onlypaciente.com', 'fecha_nacimiento' => '28/03/82', 'edad' => '38']); //
        DB::table('personas')->insert(['nombre' => 'Elias', 'apellido' => 'Mora', 'dni' => '34461735', 'email' => 'EliasMora@onlypaciente.com', 'fecha_nacimiento' => '07/04/40', 'edad' => '80']); //
        DB::table('personas')->insert(['nombre' => 'Damaris', 'apellido' => 'Negrete', 'dni' => '35435949', 'email' => 'DamarisNegrete@onlypaciente.com', 'fecha_nacimiento' => '01/04/64', 'edad' => '56']); //
        DB::table('personas')->insert(['nombre' => 'Elias', 'apellido' => 'Nogueda', 'dni' => '36410163', 'email' => 'EliasNogueda@onlypaciente.com', 'fecha_nacimiento' => '29/03/76', 'edad' => '44']); //
        DB::table('personas')->insert(['nombre' => 'Leandro', 'apellido' => 'Noziglia', 'dni' => '37384377', 'email' => 'LeandroNoziglia@onlypaciente.com', 'fecha_nacimiento' => '01/04/65', 'edad' => '55']); //
        DB::table('personas')->insert(['nombre' => 'Jorge', 'apellido' => 'Ojeda', 'dni' => '38358591', 'email' => 'JorgeOjeda@onlypaciente.com', 'fecha_nacimiento' => '30/03/74', 'edad' => '46']); //
        DB::table('personas')->insert(['nombre' => 'Javier', 'apellido' => 'Olmedo', 'dni' => '39332805', 'email' => 'JavierOlmedo@onlypaciente.com', 'fecha_nacimiento' => '29/03/77', 'edad' => '43']); //
        DB::table('personas')->insert(['nombre' => 'Cristina', 'apellido' => 'Oviedo', 'dni' => '40307019', 'email' => 'CristinaOviedo@onlypaciente.com', 'fecha_nacimiento' => '29/03/78', 'edad' => '42']); //
        DB::table('personas')->insert(['nombre' => 'Paula', 'apellido' => 'Papadopulo', 'dni' => '41281233', 'email' => 'PaulaPapadopulo@onlypaciente.com', 'fecha_nacimiento' => '29/03/79', 'edad' => '41']); //
        DB::table('personas')->insert(['nombre' => 'Ezequiel', 'apellido' => 'Paredes', 'dni' => '42255447', 'email' => 'EzequielParedes@onlypaciente.com', 'fecha_nacimiento' => '28/03/80', 'edad' => '40']); //
        DB::table('personas')->insert(['nombre' => 'Mauricio', 'apellido' => 'Pereyra', 'dni' => '43229661', 'email' => 'MauricioPereyra@onlypaciente.com', 'fecha_nacimiento' => '28/03/81', 'edad' => '39']); //
        DB::table('personas')->insert(['nombre' => 'Cecilia', 'apellido' => 'Ponce', 'dni' => '44203875', 'email' => 'CeciliaPonce@onlypaciente.com', 'fecha_nacimiento' => '28/03/82', 'edad' => '38']); //
        DB::table('personas')->insert(['nombre' => 'Nara', 'apellido' => 'Puga', 'dni' => '45178089', 'email' => 'NaraPuga@onlypaciente.com', 'fecha_nacimiento' => '28/03/83', 'edad' => '37']); //
        DB::table('personas')->insert(['nombre' => 'Rodrigo', 'apellido' => 'Ramirez', 'dni' => '46152303', 'email' => 'RodrigoRamirez@onlypaciente.com', 'fecha_nacimiento' => '27/03/84', 'edad' => '36']); //
        DB::table('personas')->insert(['nombre' => 'Anibal', 'apellido' => 'Ramos', 'dni' => '47126517', 'email' => 'AnibalRamos@onlypaciente.com', 'fecha_nacimiento' => '28/03/82', 'edad' => '38']); //
        DB::table('personas')->insert(['nombre' => 'Carlos', 'apellido' => 'Ramos', 'dni' => '48100731', 'email' => 'CarlosRamos@onlypaciente.com', 'fecha_nacimiento' => '28/03/81', 'edad' => '39']); //
        DB::table('personas')->insert(['nombre' => 'David', 'apellido' => 'Ramos', 'dni' => '49074945', 'email' => 'DavidRamos@onlypaciente.com', 'fecha_nacimiento' => '28/03/81', 'edad' => '39']); //
        DB::table('personas')->insert(['nombre' => 'Gustavo', 'apellido' => 'Ramos', 'dni' => '50049159', 'email' => 'GustavoRamos@onlypaciente.com', 'fecha_nacimiento' => '01/04/64', 'edad' => '56']); //
        DB::table('personas')->insert(['nombre' => 'Roberto', 'apellido' => 'Rios', 'dni' => '51023373', 'email' => 'RobertoRios@onlypaciente.com', 'fecha_nacimiento' => '07/04/42', 'edad' => '78']); //
        DB::table('personas')->insert(['nombre' => 'Maximiliano', 'apellido' => 'Robinson', 'dni' => '51997587', 'email' => 'MaximilianoRobinson@onlypaciente.com', 'fecha_nacimiento' => '02/04/60', 'edad' => '60']); //
        DB::table('personas')->insert(['nombre' => 'Monica', 'apellido' => 'Roura', 'dni' => '52971801', 'email' => 'MonicaRoura@onlypaciente.com', 'fecha_nacimiento' => '03/04/59', 'edad' => '61']); //
        DB::table('personas')->insert(['nombre' => 'Debora', 'apellido' => 'Ruiz Diaz', 'dni' => '53946015', 'email' => 'DeboraRuiz Diaz@onlypaciente.com', 'fecha_nacimiento' => '03/04/58', 'edad' => '62']); //
        DB::table('personas')->insert(['nombre' => 'Yesica', 'apellido' => 'Ruiz Diaz', 'dni' => '54920229', 'email' => 'YesicaRuiz Diaz@onlypaciente.com', 'fecha_nacimiento' => '03/04/57', 'edad' => '63']); //
        DB::table('personas')->insert(['nombre' => 'Ivan', 'apellido' => 'Salas', 'dni' => '55894443', 'email' => 'IvanSalas@onlypaciente.com', 'fecha_nacimiento' => '25/03/95', 'edad' => '25']); //
        DB::table('personas')->insert(['nombre' => 'Nahuel', 'apellido' => 'Segovia', 'dni' => '56868657', 'email' => 'NahuelSegovia@onlypaciente.com', 'fecha_nacimiento' => '23/03/02', 'edad' => '18']); //
        DB::table('personas')->insert(['nombre' => 'Martin', 'apellido' => 'Segovia', 'dni' => '57842871', 'email' => 'MartinSegovia@onlypaciente.com', 'fecha_nacimiento' => '23/03/01', 'edad' => '19']); //
        DB::table('personas')->insert(['nombre' => 'Raul', 'apellido' => 'Sirkosky', 'dni' => '58817085', 'email' => 'RaulSirkosky@onlypaciente.com', 'fecha_nacimiento' => '23/03/00', 'edad' => '20']); //
        DB::table('personas')->insert(['nombre' => 'Karina', 'apellido' => 'Skok', 'dni' => '59791299', 'email' => 'KarinaSkok@onlypaciente.com', 'fecha_nacimiento' => '24/03/99', 'edad' => '21']); //
        DB::table('personas')->insert(['nombre' => 'Mariano', 'apellido' => 'Sorbara', 'dni' => '60765513', 'email' => 'MarianoSorbara@onlypaciente.com', 'fecha_nacimiento' => '24/03/98', 'edad' => '22']); //
        DB::table('personas')->insert(['nombre' => 'Natalia', 'apellido' => 'Sosa', 'dni' => '61739727', 'email' => 'NataliaSosa@onlypaciente.com', 'fecha_nacimiento' => '24/03/97', 'edad' => '23']); //
        DB::table('personas')->insert(['nombre' => 'Angie', 'apellido' => 'Sostoa', 'dni' => '62713941', 'email' => 'AngieSostoa@onlypaciente.com', 'fecha_nacimiento' => '24/03/96', 'edad' => '24']); //
        DB::table('personas')->insert(['nombre' => 'Julio', 'apellido' => 'Tejada', 'dni' => '63688155', 'email' => 'JulioTejada@onlypaciente.com', 'fecha_nacimiento' => '25/03/95', 'edad' => '25']); //
        DB::table('personas')->insert(['nombre' => 'Matias', 'apellido' => 'Timino', 'dni' => '69726721', 'email' => 'MatiasTimino@onlypaciente.com', 'fecha_nacimiento' => '25/03/94', 'edad' => '26']); //
        DB::table('personas')->insert(['nombre' => 'Daniela', 'apellido' => 'Valdes', 'dni' => '70749821', 'email' => 'DanielaValdes@onlypaciente.com', 'fecha_nacimiento' => '25/03/93', 'edad' => '27']); //
        DB::table('personas')->insert(['nombre' => 'Gerardo', 'apellido' => 'Varela', 'dni' => '71772921', 'email' => 'GerardoVarela@onlypaciente.com', 'fecha_nacimiento' => '24/03/97', 'edad' => '23']); //
        DB::table('personas')->insert(['nombre' => 'Javier', 'apellido' => 'Vargas', 'dni' => '30849195', 'email' => 'JavierVargas@onlypaciente.com', 'fecha_nacimiento' => '25/03/92', 'edad' => '28']); //
        DB::table('personas')->insert(['nombre' => 'Carolina', 'apellido' => 'Vazquez', 'dni' => '30792772', 'email' => 'CarolinaVazquez@onlypaciente.com', 'fecha_nacimiento' => '27/03/87', 'edad' => '33']); //
        DB::table('personas')->insert(['nombre' => 'Sandro', 'apellido' => 'Villalba', 'dni' => '30736349', 'email' => 'SandroVillalba@onlypaciente.com', 'fecha_nacimiento' => '28/03/82', 'edad' => '38']); //
        DB::table('personas')->insert(['nombre' => 'Cristian', 'apellido' => 'Villarreal', 'dni' => '25054231', 'email' => 'CristianVillarreal@onlypaciente.com', 'fecha_nacimiento' => '29/03/77', 'edad' => '43']); //

	    }
}
