<script>
    export let value = false

    $: if (typeof value == 'string') {
        value = JSON.parse(value)
    }

    let toggle = () => {
        value = !value
    }
</script>

<style lang="scss">
    div {
        position: relative;
        display: inline-block;
        width: 43px;
        height: 28px;
        
        &.active span {
            background-color: #02B875;
        }

        &.active span:before {
            transform: translateX(15px);
        }

        span {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #00000014;
            transition: 0.4s;
            border-radius: 34px;
        }

        span:before {
            position: absolute;
            content: '';
            height: 14px;
            width: 14px;
            left: 7px;
            bottom: 7px;
            -webkit-transition: 0.4s;
            transition: 0.4s;
            background-color: var(--pco-control-bg);
            border-radius: 50%;
            box-shadow: var(--pco-box-shadow);
        }
    }
</style>

<div on:click={toggle} class:active={value}><span /></div>