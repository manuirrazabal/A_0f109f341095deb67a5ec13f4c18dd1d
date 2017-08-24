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
    	['Belleza', '1', '1'],
    	['Clases y Cursos', '2', '1'],
    	['Fiestas y Eventos', '3', '1'],
    	['Hogar', '4', '1'],
    	['Profesionales', '5', '1'],
    	['Traslado y Turismo', '6', '1'],
    	);

    /**
     * Protected attributes.
     *
     * @var array
     */
    protected $initSubcategory = array(
    	['1', 'Peluquería', '1'],
    	['1', 'Maquillaje', '2'],
    	['1', 'Spa', '3'],
    	['1', 'Manicura y Pedicura', '4'],
    	['1', 'Depilación', '5'],
    	['1', 'Otros Belleza', '6'],
    	['2', 'Tutores Escolares', '1'],
    	['2', 'Tutores Universitarios', '2'],
    	['2', 'Deportes', '3'],
    	['2', 'Informatica', '4'],
    	['2', 'Musicales', '5'],
    	['2', 'Bailes y Danzas', '6'],
    	['2', 'Idiomas', '7'],
    	['2', 'Otros Cursos', '8'],
    	['3', 'Ambientación y decoración', '1'],
    	['3', 'Disfraces', '2'],
    	['3', 'Equipamiento', '3'],
    	['3', 'Catering', '4'],
    	['3', 'Fotografia y Video', '5'],
    	['3', 'Djs, Audio e iIuminacion', '6'],
    	['3', 'Entretenimiento', '7'],
    	['3', 'Centro de Eventos', '8'],
    	['3', 'Otros Fiestas', '9'],
    	['4', 'Construcción General', '1'],
    	['4', 'Mantenimiento', '2'],
    	['4', 'Jardineria', '3'],
    	['4', 'Gasfiteria', '4'],
    	['4', 'Carpinteria', '5'],
    	['4', 'Servicios de Mueblería', '6'],
    	['4', 'Servicio Tecnico', '7'],
    	['4', 'Otros Hogar', '8'],
    	['5', 'Administration y Contabilidad', '1'],
    	['5', 'Auditorias', '2'],
    	['5', 'Comercio', '3'],
    	['5', 'Communicacion', '4'],
    	['5', 'Consultorias y Asesorías', '5'],
    	['5', 'Diseño', '6'],
    	['5', 'Education', '7'],
    	['5', 'Informatica', '8'],
    	['5', 'Investigation', '9'],
    	['5', 'Inmobiliaria y Real State', '10'],
    	['5', 'Mecanica', '11'],
    	['5', 'Salud', '12'],
    	['5', 'Traductores', '13'],
    	['5', 'Otros Servicios Profesionales', '14'],
    	['6', 'Mensajería', '1'],
    	['6', 'Mudanzas y Fletes', '2'],
    	['6', 'Arriendo de Autos', '3'],
    	['6', 'Hospedaje y Hoteleria', '4'],
    	['6', 'Viajes Especiales y Turismo', '5'],
    	['6', 'Otros Turismo', '6'],
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
                        'cat_order'   		=> $categories[1],
                        'cat_active'		=> $categories[2]
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
                        'scat_order'		=> $subcategories[2]
                     ]
                );
        	}
        }
    }
}
