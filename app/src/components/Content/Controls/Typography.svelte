<script>
    export let value

    import Select from './Select'
    import MiniInput from './MiniInput'
    import RadioIcon from './RadioIcon'

    import { items } from './Typography/google-fonts.json'

    import { translation } from 'store'

    $: if (!value)
        value = {
            family: 'Roboto',
            variant: 'regular',
        }

    $: families = items.map((i) => {
        return {
            id: i.family,
            title: i.family,
        }
    })

    $: selectedFamily = items.find((i) => i.family === value.family)

    $: variants = selectedFamily.variants.map((i) => {
        return {
            id: i,
            title: i,
        }
    })

    let sizeInput = {
        icon: 'ri-font-size-2',
        placeholder: $translation.size,
    }

    let lineHeightInput = {
        icon: 'ri-line-height',
        placeholder: $translation.line_height,
    }

    let letterSpacingInput = {
        icon: 'ri-text-spacing',
        placeholder: $translation.letter_spacing,
    }

    let wordSpacingInput = {
        icon: 'ri-text-direction-l',
        placeholder: $translation.word_spacing,
    }

    let alignment = {
        choices: [
            {
                id: 'left',
                title: $translation.left,
                icon: 'ri-align-left',
            },
            {
                id: 'right',
                title: $translation.right,
                icon: 'ri-align-right',
            },
            {
                id: 'center',
                title: $translation.center,
                icon: 'ri-align-center',
            },
            {
                id: 'justify',
                title: $translation.justify,
                icon: 'ri-align-justify',
            },
        ],
    }

    let decoration = {
        multiple: true,
        choices: [
            {
                id: 'underline',
                title: $translation.underline,
                icon: 'ri-underline',
            },
            {
                id: 'uppercase',
                title: $translation.uppercase,
                icon: 'ri-heading',
            },
            {
                id: 'italic',
                title: $translation.italic,
                icon: 'ri-italic',
            },
        ],
    }
</script>

<style lang="scss">
    div.selects {
        margin-bottom: 10px;

        :global {
            select {
                width: 100%;
                margin-bottom: 10px;

                &:last-of-type {
                    text-transform: capitalize;
                }
            }
        }
    }

    div.mini-inputs {
        float: left;
        margin-bottom: 10px;
        margin-right: -10px;

        :global {
            & > div {
                float: left;
                margin-right: 10px;
                margin-bottom: 10px;
                width: calc(50% - 12px);

                input {
                    padding: 5px 11px;
                    font-size: 12px;
                }
            }
        }
    }

    div.styling {
        :global > ul:first-child {
            margin-bottom: 10px;
            margin-right: 10px;
        }
    }
</style>

<div>
    <div class="selects">
        <Select bind:value={value.family} options={{ choices: families }} />
        <Select bind:value={value.variant} options={{ choices: variants }} />
    </div>

    <div class="mini-inputs">
        <MiniInput bind:options={sizeInput} bind:value={value.size} />
        <MiniInput
            bind:options={lineHeightInput}
            bind:value={value.line_height}
        />
        <MiniInput
            bind:options={letterSpacingInput}
            bind:value={value.letter_spacing}
        />
        <MiniInput
            bind:options={wordSpacingInput}
            bind:value={value.word_spacing}
        />
    </div>

    <div class="styling">
        <RadioIcon bind:value={value.alignment} options={alignment} />
        <RadioIcon bind:value={value.decoration} options={decoration} />
    </div>
</div>