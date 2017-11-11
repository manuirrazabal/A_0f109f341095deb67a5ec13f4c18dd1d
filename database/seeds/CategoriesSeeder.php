<?php

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Protected attributes.
     *
     * @var array
     */
    protected $initCategory = array(
    	['Belleza', 'belleza', '1', '1'],
    	['Clases y Cursos', 'clases-y-cursos', '2', '1'],
    	['Fiestas y Eventos', 'fiestas-y-eventos', '3', '1'],
    	['Hogar', 'hogar', '4', '1'],
    	['Profesionales', 'profesionales', '5', '1'],
    	['Traslado y Turismo', 'traslado-y-turismo', '6', '1'],
    	);

    /**
     * Protected attributes.
     *
     * @var array
     */
    protected $initSubcategory = array(
    	['1', 'Peluquería', 'peluqueria', '1'],
    	['1', 'Maquillaje', 'maquillaje', '2'],
    	['1', 'Spa', 'spa', '3'],
    	['1', 'Manicura y Pedicura', 'manicura-y-pedicura', '4'],
    	['1', 'Depilación', 'depilacion', '5'],
    	['1', 'Otros Belleza', 'otros-belleza', '6'],
    	['2', 'Tutores Escolares', 'tutores-escolares', '1'],
    	['2', 'Tutores Universitarios', 'tutores-universitarios', '2'],
    	['2', 'Deportes', 'deportes', '3'],
    	['2', 'Informatica', 'informatica', '4'],
    	['2', 'Musicales', 'musicales', '5'],
    	['2', 'Bailes y Danzas', 'bailes-y-danzas', '6'],
    	['2', 'Idiomas', 'idiomas', '7'],
    	['2', 'Otros Cursos', 'otros-cursos', '8'],
    	['3', 'Ambientación y decoración', 'ambientacion-y-decoracion', '1'],
    	['3', 'Disfraces', 'disfraces', '2'],
    	['3', 'Equipamiento', 'equipamiento', '3'],
    	['3', 'Catering', 'catering', '4'],
    	['3', 'Fotografia y Video', 'fotografia-y-video', '5'],
    	['3', 'Djs, Audio e iIuminacion', 'djs-audio-e-iluminacion', '6'],
    	['3', 'Entretenimiento', 'entretenimiento', '7'],
    	['3', 'Centro de Eventos', 'centro-de-eventos', '8'],
    	['3', 'Otros Fiestas', 'otros-fiestas', '9'],
    	['4', 'Construcción General', 'contruccion-general', '1'],
    	['4', 'Mantenimiento', 'mantenimiento', '2'],
    	['4', 'Jardineria', 'jardineria', '3'],
    	['4', 'Gasfiteria', 'gasfiteria', '4'],
    	['4', 'Carpinteria', 'carpinteria', '5'],
    	['4', 'Servicios de Mueblería', 'servicios-de-muebleria', '6'],
    	['4', 'Servicio Tecnico', 'servicio-tecnico', '7'],
    	['4', 'Otros Hogar', 'otros-hogar', '8'],
    	['5', 'Administration y Contabilidad', 'administracion-y-contabilidad', '1'],
    	['5', 'Auditorias', 'auditorias', '2'],
    	['5', 'Comercio', 'comercio', '3'],
    	['5', 'Communicacion', 'comunicacion', '4'],
    	['5', 'Consultorias y Asesorías', 'consultorias-y-asesorias', '5'],
    	['5', 'Diseño', 'diseno', '6'],
    	['5', 'Education', 'educacion', '7'],
    	['5', 'Informatica, Webs, Redes', 'informatica-webs-redes', '8'],
    	['5', 'Investigation', 'investigacion', '9'],
    	['5', 'Inmobiliaria y Real State', 'inmobiliaria-y-real-state', '10'],
    	['5', 'Mecanica', 'mecanica', '11'],
    	['5', 'Salud', 'salud', '12'],
    	['5', 'Traductores', 'traductores', '13'],
    	['5', 'Otros Servicios Profesionales', 'otros-servicios-profesionales', '14'],
    	['6', 'Mensajería', 'mensajeria', '1'],
    	['6', 'Mudanzas y Fletes', 'mudanzas-y-fletes', '2'],
    	['6', 'Arriendo de Autos', 'arriendo-de-autos', '3'],
    	['6', 'Hospedaje y Hoteleria', 'hospedaje-y-hoteleria', '4'],
    	['6', 'Viajes Especiales y Turismo', 'viajes-especiales-y-turismo', '5'],
    	['6', 'Otros Turismo', 'otros-turismo', '6'],
    	);



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Loading and saving countries
        foreach ($this->initCategory as $categories) {
        	//If Doesnt Exist Create It
        	if (Category::where('cat_description', $categories[0])->count() == 0) {
        		//Create a new record. 
        		$newCategory = factory(Category::class, 1)->create(
                    [
                        'cat_description'   => $categories[0],
                        'cat_slug'          => $categories[1],
                        'cat_order'   		=> $categories[2],
                        'cat_active'		=> $categories[3]
                     ]
                );
        	}
        }

        //Loading and saving countries
        foreach ($this->initSubcategory as $subcategories) {
        	//If Doesnt Exist Create It
        	if (Subcategory::where('scat_description', $subcategories[1])->count() == 0) {
        		//Create a new record. 
        		$newCategory = factory(Subcategory::class, 1)->create(
                    [
                        'scat_cat_id'   	=> $subcategories[0],
                        'scat_description'  => $subcategories[1],
                        'scat_slug'         => $subcategories[2],
                        'scat_order'		=> $subcategories[3]
                     ]
                );
        	}
        }
    }
}
