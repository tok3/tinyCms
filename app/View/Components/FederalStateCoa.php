<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FederalStateCoa extends Component
{
    public string $stateName;
    public ?array $coat;

    /**
     * @param string $stateName  z.B. "Bayern", "Berlin", "Brandenburg"
     */
    public function __construct(string $stateName)
    {
        $this->stateName = trim($stateName);
        $this->coat = $this->mapCoat($this->stateName);
    }

    public function render()
    {

        return view('components.federal-state-coa', [
            'coat'  => $this->coat,
            'label' => $this->stateName,
        ]);
    }

    /**
     * Mappt Bundesland-Namen auf das richtige Wappen-Bild.
     * Passe die Dateinamen hier an deine echten Files an.
     */
    private function mapCoat(string $label): ?array
    {
        $map = [
            'Baden-Württemberg'      => 'Lesser_coat_of_arms_of_Baden-Wuerttemberg.svg.png',
            'Bayern'                 => 'Bayern_Wappen.svg.png',
            'Bayern'                 => 'Landessymbol_Freistaat_Bayern.svg.png', // schöner als Bayern_Wappen.svg.png
            'Berlin'                 => 'Country_symbol_of_Berlin_b-w.svg.png',
            'Brandenburg'            => 'DEU_Brandenburg_COA.svg.webp',
            'Bremen'                 => 'Bremen_Wappen_frei.svg.png',
            'Hamburg'                => 'DEU_Hamburg_COA.svg.png',
            'Hessen'                 => 'Coat_of_arms_of_Hesse.svg.webp',
            'Mecklenburg-Vorpommern' => 'Coat_of_arms_of_Mecklenburg-Western_Pomerania_(great).svg.png',
            'Niedersachsen'          => 'Coat_of_arms_of_Lower_Saxony.svg.png',
            'Nordrhein-Westfalen'    => 'Wappenzeichen_NRW_original_colour.svg.png',
            'Rheinland-Pfalz'        => 'Coat_of_arms_of_Rhineland-Palatinate.svg.webp',
            'Saarland'               => 'Coa_de-saarland.svg.png',
            'Sachsen-Anhalt'         => 'Wappen_Sachsen-Anhalt.svg.png',
            'Sachsen'                => 'Wappen_Freistaat_Sachsen_von_Wettinern_&_Askanier_ohne_Kontur.svg.png',
            'Schleswig-Holstein'     => 'State_symbol_of_Schleswig-Holstein.svg.png',
            'Thüringen'              => 'Coat_of_arms_of_Thuringia.svg.webp',
        ];

        if (! isset($map[$label])) {
            return null;
        }

        return [
            'img' => asset('assets/img/bundeslaender_wappen/' . $map[$label]),
            'alt' => 'Wappen ' . $label,
        ];
    }
}
