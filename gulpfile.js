const fs = require('fs-extra');
const gulp = require('gulp');
const axios = require('axios');
const wpPot = require('gulp-wp-pot');
const gettextParser = require("gettext-parser");

const languages = [
    {
        api: 'ar',
        wp: ['ar'],
        name: "Arabic",
        nativeName: "العربية",
        dir: "rtl",
    },
    {
        api: 'de',
        wp: ['de_DE', 'de_CH_informal', 'de_CH', 'de_DE_formal', 'de_AT'],
        name: "German",
        nativeName: "Deutsch",
        dir: "ltr",
    },
    {
        api: 'es',
        wp: ['es_CL', 'es_EC', 'es_PE', 'es_CR', 'es_AR', 'es_CO', 'es_UY', 'es_PR', 'es_GT', 'es_VE', 'es_ES', 'es_MX'],
        name :"Spanish",
        nativeName :"Español",
        dir :"ltr",
    },
    {
        api: 'id',
        wp: ['id_ID'],
        name: "Indonesian",
        nativeName: "Indonesia",
        dir: "ltr",
    },
    {
        api: 'fr',
        wp: ['fr_FR', 'fr_BE', 'fr_CA'],
        name: "French",
        nativeName: "Français",
        dir: "ltr",
    },
    {
        api: 'zh-Hant',
        wp: ['zh_TW'],
        name:"Chinese Traditional",
        nativeName :"繁體中文",
        dir :"ltr",
    },
    {
        api: 'nl',
        wp: ['nl_NL', 'nl_BE', 'nl_NL_formal'],
        name: "Dutch",
        nativeName: "Nederlands",
        dir: "ltr",
    },
    {
        api: 'pt',
        wp: ['pt_AO', 'pt_BR', 'pt_PT', 'pt_PT_ao90'],
        name: "Portuguese",
        nativeName: "Português",
        dir: "ltr",
    },
    {
        api: 'ur',
        wp: ['ur'],
        name: "Urdu",
        nativeName: "اردو",
        dir: "rtl",
    },
    {
        api: 'ru',
        wp: ['ru_RU'],
        name: "Russian",
        nativeName: "Русский",
        dir: "ltr",
    },
    {
        api: 'bn',
        wp: ['bn_BD'],
        name: "Bangla",
        nativeName: "বাংলা",
        dir: "ltr",

    },
    {
        api: 'ja',
        wp: ['ja'],
        name: "Japanese",
        nativeName: "日本語",
        dir: "ltr",
    }
];

let tr = async (text, code) => {
    const options = {
        method: 'POST',
        url: 'https://microsoft-translator-text.p.rapidapi.com/translate',
        params: {
            to: code,
            from: "en",
            'api-version': '3.0',
            profanityAction: 'NoAction',
            textType: 'plain'
        },
        headers: {
            'content-type': 'application/json',
            'x-rapidapi-key': '04a8ad7367msh8cb71cda86e02b3p1dff40jsn743d878a550e',
            'x-rapidapi-host': 'microsoft-translator-text.p.rapidapi.com'
        },
        data: [{Text: text}]
    };
    
    let res = await axios.request(options);

    return res.data[0]['translations'][0]['text'];
}


gulp.task('make-pot', function () {
    return gulp.src('./*.php')
        .pipe(wpPot( {
            domain: 'pco',
            package: 'PluginCube Options'
        } ))
        .pipe(gulp.dest('./languages/pco.pot'));
});


gulp.task('api-translate', async function (done) {    
    var input = require('fs').readFileSync('./languages/pco.pot');
  
    for (const language of languages) {
        console.log(language.nativeName);

        var po = gettextParser.po.parse(input);
        for(let k in po.translations['']) {
        
        if(po.translations[''][k] && po.translations[''][k].msgstr && po.translations[''][k].msgstr[0] == '') {
                let translation = await tr(k, language.api)
                po.translations[''][k].msgstr[0] = translation
                
                if( ! po.translations[''][k].comments) {
                    po.translations[''][k].comments = {}
                }
            }
        } 
        
        var output = gettextParser.mo.compile(po);
        var output_po = gettextParser.po.compile(po);
        
        for (const local of language.wp) {
            fs.writeFileSync('./languages/' + local +'.mo', output);
            fs.writeFileSync('./languages/' + local +'.po', output_po);
        }
    }
    
    done();
});

gulp.task('translate', gulp.series('make-pot', 'api-translate'));
