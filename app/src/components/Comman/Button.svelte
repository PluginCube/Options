<script>
    export let style = null;
    export let disabled = false;
</script>

<style>
    button {
        height: 32px;
        line-height: 30px;
        text-align: center;
        transition: all 0.2s;
        border-radius: 5px;
        font-size: 12px;
        margin-top: 85px;
        float: left;
        background: var(--cf-primary-text);
        color: #fff;
        padding: 0px 5px;
        border: none;
        cursor: pointer;
        outline: none;
    }

    button:disabled {
        cursor: auto;
        opacity: 0.6;
    }
</style>

<button on:click {disabled} {style}>
    <slot>Text Here</slot>
</button>