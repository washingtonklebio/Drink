<template>
    <div class="box">
        <div class="box-icon">
            <i :class="icon" :style="style"></i>
        </div>
        <div class="box-info">
            <span class="box-title">{{ title }}</span>
            <span class="box-value">{{ value }}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Box',
    props: ['title', 'value', 'icon', 'color'],
    computed: {
        style() {
            return "color: " + (this.color || "#000")
        }
    }
}
</script>

<style>
    .box {
        flex: 1;
        display: flex;
        border-radius: 8px;
        margin-right: 20px;
        margin-bottom: 20px;
        background-color: #FFF;
        padding: 20px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.15);
    }
    .box-icon {
        display: flex;
        align-items: center;
    }
    .box-icon i {
        font-size: 5rem;
    }
    .box-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
    .box-title {
        font-size: 1.2rem;
    }
    .box-value {
        font-size: 3rem;
    }
</style>