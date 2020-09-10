<script>
    export let value = {
        family: 'Roboto',
        variant: 'regular',
    }

    import Select from "./Select";
    import MiniInput from './MiniInput'
    import RadioIcon from './RadioIcon'

    import { items } from "./Typography/google-fonts.json";

    import { translation } from 'store'

    $: families = items.map(i => {
        return {
            id: i.family,
            title: i.family
        }
    });

    $: selectedFamily = items.find(i => i.family === value.family);

    $: variants = selectedFamily.variants.map(i => {
        return {
            id: i,
            title: i
        }
    })
    
    let sizeInput = {
        icon: 'ri-font-size-2',
        placeholder: $translation.size
    };

    let lineHeightInput = {
        icon: 'ri-line-height',
        placeholder: $translation.line_height
    }

    let spacingInput = {
        icon: 'ri-text-spacing',
        placeholder: $translation.spacing
    }

    let alignment = [
        {
            id: 'left',
            title: $translation.left,
            icon: 'ri-align-left'
        },
        {
            id: 'right',
            title: $translation.right,
            icon: 'ri-align-right'
        },
        {
            id: 'center',
            title: $translation.center,
            icon: 'ri-align-center'
        },
        {
            id: 'justify',
            title: $translation.justify,
            icon: 'ri-align-justify'
        }
    ]
</script>

<style lang="scss">
        div.selects {
            margin-bottom: 15px;

            :global {
                select {
                    width: 265px;
                    margin-bottom: 10px;
                    margin-right: 15px;
                    
                    &:last-of-type {
                        text-transform: capitalize;
                    }
                }
            }
        }

        div.mini-inputs {
            float: left;
            margin-bottom: 20px;

            :global {
                & > div {
                    float: left;
                    margin-right: 10px;
                    margin-bottom: 10px;
                }
            }
        }
</style>

<div>
    <div class="selects">
        <Select bind:value={value.family} options={{choices: families}}/>
        <Select bind:value={value.variant} options={{choices: variants}}/>
    </div>

    <div class="mini-inputs">
        <MiniInput bind:options={sizeInput} bind:value={value.size}/>
        <MiniInput bind:options={lineHeightInput} bind:value={value.line_height}/>
        <MiniInput bind:options={spacingInput} bind:value={value.letter_spacing}/>
    </div>

    <div class="alignment">
        <RadioIcon bind:value={value.alignment} options={{choices: alignment}}/>
    </div>
</div>