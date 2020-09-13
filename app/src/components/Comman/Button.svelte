<script>
    export let style = null
    export let disabled = false
</script>

<style lang="scss">
    button {
        height: 32px;
        text-align: center;
        transition: all 0.2s;
        font-size: 12px;
        border-radius: var(--cf-border-radius);
        background: var(--cf-primary-text);
        color: #fff;
        padding: 0px 12px;
        border: none;
        cursor: pointer;
        outline: none;

        &:disabled {
            cursor: auto;
            opacity: 0.6;
        }
    }
</style>

<button on:click {disabled} {style}>
    <slot>Text Here</slot>
</button>