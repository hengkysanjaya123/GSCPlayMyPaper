@extends('master')
@section('assets')
    <meta name="xml" content="{{$name}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/midiplayer.css')}}" />

    <script src="{{asset('js/verovio-toolkit.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/basic-events.js')}}"></script>
    <script src="{{asset('js/instruments/'. $instrument . '.js')}}"></script>
    <script src="{{asset('js/midiplayer.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
@endsection
@section('section')
    <div>
        <div class="container">
            <div class="control">
                <div class="left">
                    <select id="instrument">
                        <option @if($instrument == '000_acoustic_grand_piano') selected @endif
                                value="000_acoustic_grand_piano">000_acoustic_grand_piano</option>
                        <option @if($instrument == '001_acoustic_brite_piano') selected @endif
                                value="001_acoustic_brite_piano">001_acoustic_brite_piano</option>
                        <option @if($instrument == '002_electric_grand_piano') selected @endif
                                value="002_electric_grand_piano">002_electric_grand_piano</option>
                        <option @if($instrument == '004_electric_piano_1_rhodes') selected @endif
                                value="004_electric_piano_1_rhodes">004_electric_piano_1_rhodes</option>
                        <option @if($instrument == '                      value') selected @endif
                                value="005_electric_piano_2_chorused_yamaha_dx">005_electric_piano_2_chorused_yamaha_dx
                        </option>
                        <option @if($instrument == '006_harpsichord') selected @endif
                                value="006_harpsichord">006_harpsichord</option>
                        <option @if($instrument == '007_clavinet') selected @endif
                        value="007_clavinet">007_clavinet</option>
                        <option @if($instrument == '008_celesta') selected @endif value="008_celesta">008_celesta</option>
                        <option @if($instrument == '009_glockenspiel') selected @endif
                                value="009_glockenspiel">009_glockenspiel</option>
                        <option @if($instrument == '013_xylophone') selected @endif
                        value="013_xylophone">013_xylophone</option>
                        <option @if($instrument == '014_tubular_bells') selected @endif
                                value="014_tubular_bells">014_tubular_bells</option>
                        <option @if($instrument == '015_dulcimer') selected @endif
                        value="015_dulcimer">015_dulcimer</option>
                        <option @if($instrument == '016_hammond_organ') selected @endif
                                value="016_hammond_organ">016_hammond_organ</option>
                        <option @if($instrument == '019_church_organ') selected @endif
                                value="019_church_organ">019_church_organ</option>
                        <option @if($instrument == '021_accordion') selected @endif
                        value="021_accordion">021_accordion</option>
                        <option @if($instrument == '023_tango_accordion') selected @endif
                                value="023_tango_accordion">023_tango_accordion</option>
                        <option @if($instrument == '024_nylon_guitar') selected @endif
                                value="024_nylon_guitar">024_nylon_guitar</option>
                        <option @if($instrument == '025_steel_guitar') selected @endif
                                value="025_steel_guitar">025_steel_guitar</option>
                        <option @if($instrument == '026_jazz_guitar') selected @endif
                                value="026_jazz_guitar">026_jazz_guitar</option>
                        <option @if($instrument == '027_clean_electric_guitar') selected @endif
                                value="027_clean_electric_guitar">027_clean_electric_guitar</option>
                        <option @if($instrument == '028_muted_electric_guitar') selected @endif
                                value="028_muted_electric_guitar">028_muted_electric_guitar</option>
                        <option @if($instrument == '029_overdriven_guitar') selected @endif
                                value="029_overdriven_guitar">029_overdriven_guitar</option>
                        <option @if($instrument == '030_distortion_guitar') selected @endif
                                value="030_distortion_guitar">030_distortion_guitar</option>
                        <option @if($instrument == '032_acoustic_bass') selected @endif
                                value="032_acoustic_bass">032_acoustic_bass</option>
                        <option @if($instrument == '033_finger_bass') selected @endif
                                value="033_finger_bass">033_finger_bass</option>
                        <option @if($instrument == '034_pick_bass') selected @endif
                        value="034_pick_bass">034_pick_bass</option>
                        <option @if($instrument == '035_fretless_bass') selected @endif
                                value="035_fretless_bass">035_fretless_bass</option>
                        <option @if($instrument == '036_slap_bass_1') selected @endif
                                value="036_slap_bass_1">036_slap_bass_1</option>
                        <option @if($instrument == '037_slap_bass_2') selected @endif
                                value="037_slap_bass_2">037_slap_bass_2</option>
                        <option @if($instrument == '038_synth_bass_1') selected @endif
                                value="038_synth_bass_1">038_synth_bass_1</option>
                        <option @if($instrument == '040_violin') selected @endif value="040_violin">040_violin</option>
                        <option @if($instrument == '042_cello') selected @endif value="042_cello">042_cello</option>
                        <option @if($instrument == '044_tremolo_strings') selected @endif
                                value="044_tremolo_strings">044_tremolo_strings</option>
                        <option @if($instrument == '045_pizzicato_strings') selected @endif
                                value="045_pizzicato_strings">045_pizzicato_strings</option>
                        <option @if($instrument == '046_harp') selected @endif value="046_harp">046_harp</option>
                        <option @if($instrument == '047_timpani') selected @endif value="047_timpani">047_timpani</option>
                        <option @if($instrument == '048_string_ensemble_1_marcato') selected @endif
                                value="048_string_ensemble_1_marcato">048_string_ensemble_1_marcato</option>
                        <option @if($instrument == '053_voice_oohs') selected @endif
                        value="053_voice_oohs">053_voice_oohs</option>
                        <option @if($instrument == '056_trumpet') selected @endif value="056_trumpet">056_trumpet</option>
                        <option @if($instrument == '057_trombone') selected @endif
                        value="057_trombone">057_trombone</option>
                        <option @if($instrument == '058_tuba') selected @endif value="058_tuba">058_tuba</option>
                        <option @if($instrument == '059_muted_trumpet') selected @endif
                                value="059_muted_trumpet">059_muted_trumpet</option>
                        <option @if($instrument == '060_french_horn') selected @endif
                                value="060_french_horn">060_french_horn</option>
                        <option @if($instrument == '061_brass_section') selected @endif
                                value="061_brass_section">061_brass_section</option>
                        <option @if($instrument == '064_soprano_sax') selected @endif
                                value="064_soprano_sax">064_soprano_sax</option>
                        <option @if($instrument == '065_alto_sax') selected @endif
                        value="065_alto_sax">065_alto_sax</option>
                        <option @if($instrument == '066_tenor_sax') selected @endif
                        value="066_tenor_sax">066_tenor_sax</option>
                        <option @if($instrument == '067_baritone_sax') selected @endif
                                value="067_baritone_sax">067_baritone_sax</option>
                        <option @if($instrument == '068_oboe') selected @endif value="068_oboe">068_oboe</option>
                        <option @if($instrument == '069_english_horn') selected @endif
                                value="069_english_horn">069_english_horn</option>
                        <option @if($instrument == '070_bassoon') selected @endif value="070_bassoon">070_bassoon</option>
                        <option @if($instrument == '071_clarinet') selected @endif
                        value="071_clarinet">071_clarinet</option>
                        <option @if($instrument == '072_piccolo') selected @endif value="072_piccolo">072_piccolo</option>
                        <option @if($instrument == '073_flute') selected @endif value="073_flute">073_flute</option>
                        <option @if($instrument == '074_recorder') selected @endif
                        value="074_recorder">074_recorder</option>
                        <option @if($instrument == '075_pan_flute') selected @endif
                        value="075_pan_flute">075_pan_flute</option>
                        <option @if($instrument == '076_bottle_blow') selected @endif
                                value="076_bottle_blow">076_bottle_blow</option>
                        <option @if($instrument == '079_ocarina') selected @endif value="079_ocarina">079_ocarina</option>
                        <option @if($instrument == '080_square_wave') selected @endif
                                value="080_square_wave">080_square_wave</option>
                        <option @if($instrument == '084_charang') selected @endif value="084_charang">084_charang</option>
                        <option @if($instrument == '088_new_age') selected @endif value="088_new_age">088_new_age</option>
                        <option @if($instrument == '094_halo_pad') selected @endif
                        value="094_halo_pad">094_halo_pad</option>
                        <option @if($instrument == '095_sweep_pad') selected @endif
                        value="095_sweep_pad">095_sweep_pad</option>
                        <option @if($instrument == '098_crystal') selected @endif value="098_crystal">098_crystal</option>
                        <option @if($instrument == '101_goblins--unicorn">') selected @endif
                                value="101_goblins--unicorn">101_goblins--unicorn</option>
                        <option @if($instrument == '102_echo_voice') selected @endif
                        value="102_echo_voice">102_echo_voice</option>
                        <option @if($instrument == '104_sitar') selected @endif value="104_sitar">104_sitar</option>
                        <option @if($instrument == '114_steel_drums') selected @endif
                                value="114_steel_drums">114_steel_drums</option>
                        <option @if($instrument == '115_wood_block') selected @endif
                        value="115_wood_block">115_wood_block</option>
                        <option @if($instrument == '120_guitar_fret_noise') selected @endif
                                value="120_guitar_fret_noise">120_guitar_fret_noise</option>
                        <option @if($instrument == '122_seashore') selected @endif
                        value="122_seashore">122_seashore</option>
                        <option @if($instrument == '125_helicopter') selected @endif
                        value="125_helicopter">125_helicopte</option>
                    </select>
                    <button id="reload">Reload Instrument</button>
                    <button id="play">Play</button>
                </div>
                <div class="right">
                    <button id="home">Back to Home</button>
                </div>
            </div>

            <div style="height: 30px;">
                <div id="player" style="z-index: 20; position: absolute; display: none;"></div>
            </div>
            <div id="output">

            </div>
        </div>
    </div>
@endsection
