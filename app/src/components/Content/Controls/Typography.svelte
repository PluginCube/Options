<script>
    export let value = {}
    export let args

    import merge from 'deepmerge'

    $: if (! value) value = {};

    $: value = merge(
        {
            family: 'Roboto',
            variant: 'regular',
        },
        value
    )

    $: args = merge(
        {
            family: true,
            variant: true,
            size: true,
            variant: true,
            lineHeight: true,
            letterSpacing: true,
            wordSpacing: true,
            alignment: true,
            decoration: true,
        },
        args
    )

    import { translation } from 'store'

    import Select from './Select'

    import MiniInput from './MiniInput'

    import RadioIcon from './RadioIcon'

    import { items } from './Typography/google-fonts.json'

    $: families = items.map((i) => {
        return {
            value: i.family,
            label: i.family,
        }
    })

    $: selectedFamily = items.find((i) => i.family === value.family)

    $: variants = selectedFamily.variants.map((i) => {
        return {
            value: i,
            label: i,
        }
    })

    let sizeInput = {
        icon: 'ri-font-size-2',
        attributes: {
            placeholder: $translation.size,
        },
    }

    let lineHeight = {
        icon: 'ri-line-height',
        attributes: {
            placeholder: $translation.line_height,
        },
    }

    let letterSpacing = {
        icon: 'ri-text-spacing',
        attributes: {
            placeholder: $translation.letter_spacing,
        },
    }

    let wordSpacing = {
        icon: 'ri-text-direction-l',
        attributes: {
            placeholder: $translation.word_spacing,
        },
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
        margin-bottom: 20px;

        :global {
            .selectContainer  {
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
                width: calc(50% - 10px);

                input {
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
        {#if args.family}
            <Select
                bind:value={value.family}
                args={{ choices: families }}
            />
        {/if}

        {#if args.variant}
            <Select
                bind:value={value.variant}
                args={{ choices: variants }}
            />
        {/if}
    </div>

    <div class="mini-inputs">
        {#if args.size}
            <MiniInput args={sizeInput} bind:value={value.size} />
        {/if}

        {#if args.lineHeight}
            <MiniInput args={lineHeight} bind:value={value.lineHeight} />
        {/if}

        {#if args.letterSpacing}
            <MiniInput
                args={letterSpacing}
                bind:value={value.letterSpacing}
            />
        {/if}

        {#if args.wordSpacing}
            <MiniInput args={wordSpacing} bind:value={value.wordSpacing} />
        {/if}
    </div>

    <div class="styling">
        {#if args.alignment}
            <RadioIcon bind:value={value.alignment} args={alignment} />
        {/if}

        {#if args.decoration}
            <RadioIcon bind:value={value.decoration} args={decoration} />
        {/if}
    </div>
</div>