<script>
	export let type
	export let value
	export let title = null
	export let description = undefined
	export let options = {}
    export let errors = undefined
    export let mini;
    export let animate = true;

    import { fade } from "svelte/transition";

    import Text from './Controls/Text'
    import Textarea from './Controls/Textarea'
    import Number from './Controls/Number'
    import Switch from './Controls/Switch'
    import Select from './Controls/Select'
    import Image from './Controls/Image'
    import Color from './Controls/Color'
    import Icon from './Controls/Icon'
    import Editor from './Controls/Editor'
    import Repeater from './Controls/Repeater'
    import RadioImage from './Controls/RadioImage'
    import Export from './Controls/Export'
    import Import from './Controls/Import'
    import HTML from './Controls/HTML'
    import Preset from './Controls/Preset'
    import Multicolor from './Controls/Multicolor'
    import MiniInput from './Controls/MiniInput'
    import MultiMiniInput from './Controls/MultiMiniInput'
    import RadioIcon from './Controls/RadioIcon'
    import Typography from './Controls/Typography'

    let types = {
        'text': Text,
        'textarea': Textarea,
        'number': Number,
        'switch': Switch,
        'select': Select,
        'image': Image,
        'color': Color,
        'icon': Icon,
        'editor': Editor,
        'repeater': Repeater,
        'radio-image': RadioImage,
        'export': Export,
        'import': Import,
        'html': HTML,
        'preset': Preset,
        'multi-color': Multicolor,
        'mini-input': MiniInput,
        'multi-mini-input' :MultiMiniInput,
        'radio-icon': RadioIcon,
        'typography': Typography
    };
</script>


<style lang="scss">
    div {
        float: left;
        width: 100%;
        padding: 25px 0px;

        header {
            float: left;
            width: 35%;
            font-weight: 600;
            font-size: 14px;
            color: var(--cf-primary-text);
            margin-right: 15%;
            
            p {
                font-size: 12px;
                line-height: 22px;
                font-weight: 400;
                color: var(--cf-secondary-text);
                margin: 15px 0px 0px 0px;
            }
        }

        main {
            float: left;
            width: 50%;
            
            p {
                color: red;
            }
        }

        &.mini {
            padding: 0px 0px 30px 0px;
            min-height: 34px;

            main {
                float: left;
                width: fit-content;
                max-width: 100%;
            }
            
            header {
                float: left;
                width: fit-content;
                min-width: 50px;
                margin-bottom: 15px;

                span {
                    font-size: 13px;
                }
            }
        }
    }
</style>

<div transition:fade={{duration: animate ? 150 : 0}} class:mini>
    <header>
        {#if title}
            <span>{title}</span>
        {/if}
        
        {#if description}
            <p>{description}</p>
        {/if}
    </header>

    <main>
        <svelte:component this={types[type]} {errors} bind:value bind:options/>

        {#if errors}
            {#each errors as error}
                <p>{error}</p>   
            {/each}
        {/if}
	</main>
</div>