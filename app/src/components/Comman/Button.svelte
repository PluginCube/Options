<script>
    export let small = null
    export let style = null
    export let disabled = false
    export let type = "button"
</script>

<style lang="scss">
    button {
        display: inline-block;
        text-decoration: none;
        font-size: 12px;
        min-height: 30px;
        margin: 0;
        padding: 0 10px;
        cursor: pointer;
        border-width: 0px;
        border-radius: 3px;
        white-space: nowrap;
        box-sizing: border-box;
        background: var(--pco-primary-button-bg);
        color: var(--pco-primary-button-text);
        font-weight: 300;

        &.pco-button-small {
            min-height: 26px;
            padding: 0 10px;
            font-size: 11px;
            padding-top: 1px;
        }

        &:disabled {
            cursor: auto;
            opacity: 0.6;
        }
    }
</style>

<button on:click {disabled} {style} class:pco-button-small={small} {type}>
    <slot>Text Here</slot>
</button>