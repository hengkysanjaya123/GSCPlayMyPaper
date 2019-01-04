<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IndexController extends Controller{
    public function index(){
        return view('index');
    }

    public function uploadFile(Request $request){
        $name = strtotime(date('y-m-d h:i:s')) . rand();
        $file = File::get($request->file('file'));
        File::put('scan/' . $name . '.jpg', $file);

        return $this->convert($name);
    }

    public function convert($name){
        exec('export JAVA_HOME=/Library/Java/JavaVirtualMachines/jdk1.8.0_192.jdk/Contents/Home/ && 
        export PATH=${PATH}:${JAVA_HOME}/bin && 
        export GRADLE_HOME=/usr/local/Cellar/gradle/4.10.2 &&
        export PATH=${PATH}:${GRADLE_HOME}/bin &&
        export GRADLE_USER_HOME=/Users/lukicenturi/.gradle &&
        export PATH=${PATH}:${GRADLE_USER_HOME} &&
        export TESSDATA_PREFIX=/usr/local/opt/tesseract/share &&
        export PATH=${PATH}:${TESSDATA_PREFIX} &&
        cd /Users/lukicenturi/Sites/playmypaper/audiveris &&
        sudo /usr/local/Cellar/gradle/4.10.2/bin/gradle run -PcmdLineArgs="-batch,-export,-output,'. base_path('public/xml') .',--,'. base_path('public/scan/'. $name . '.jpg').'" &&
        cd '. base_path('public/xml/' . $name) . '
        sudo unzip -a '. $name . '.mxl');

        $returnJSON = [
            'name' => $name,
        ];

        return response()->json($returnJSON);
    }

    public function playMusic($name, Request $request){
        $files = [
            "000_acoustic_grand_piano",
            "001_acoustic_brite_piano",
            "002_electric_grand_piano",
            "004_electric_piano_1_rhodes",
            "005_electric_piano_2_chorused_yamaha_dx",
            "006_harpsichord",
            "007_clavinet",
            "008_celesta",
            "009_glockenspiel",
            "013_xylophone",
            "014_tubular_bells",
            "015_dulcimer",
            "016_hammond_organ",
            "019_church_organ",
            "021_accordion",
            "023_tango_accordion",
            "024_nylon_guitar",
            "025_steel_guitar",
            "026_jazz_guitar",
            "027_clean_electric_guitar",
            "028_muted_electric_guitar",
            "029_overdriven_guitar",
            "030_distortion_guitar",
            "032_acoustic_bass",
            "033_finger_bass",
            "034_pick_bass",
            "035_fretless_bass",
            "036_slap_bass_1",
            "037_slap_bass_2",
            "038_synth_bass_1",
            "040_violin",
            "042_cello",
            "044_tremolo_strings",
            "045_pizzicato_strings",
            "046_harp",
            "047_timpani",
            "048_string_ensemble_1_marcato",
            "053_voice_oohs",
            "056_trumpet",
            "057_trombone",
            "058_tuba",
            "059_muted_trumpet",
            "060_french_horn",
            "061_brass_section",
            "064_soprano_sax",
            "065_alto_sax",
            "066_tenor_sax",
            "067_baritone_sax",
            "068_oboe",
            "069_english_horn",
            "070_bassoon",
            "071_clarinet",
            "072_piccolo",
            "073_flute",
            "074_recorder",
            "075_pan_flute",
            "076_bottle_blow",
            "079_ocarina",
            "080_square_wave",
            "084_charang",
            "088_new_age",
            "094_halo_pad",
            "095_sweep_pad",
            "098_crystal",
            "101_goblins--unicorn",
            "102_echo_voice",
            "104_sitar",
            "114_steel_drums",
            "115_wood_block",
            "120_guitar_fret_noise",
            "122_seashore",
            "125_helicopter"
        ];

        if(!$request->has('instrument') || !in_array($request->get('instrument'), $files)){
            $instrument = $files[0];
        }else{
            $instrument = $request->get('instrument');
        }

        return view('play', [
            'name' => $name,
            'instrument' => $instrument
        ]);
    }
}