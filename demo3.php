<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Library Adventure</title>
    <style>
        body {
            margin: 0;
            background: linear-gradient(135deg, #f8bbd0 0%, #ce93d8 50%, #ba68c8 100%);
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            overflow: hidden;
            display: grid;
            place-items: center;
        }

        .game-wrapper {
            position: fixed;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        h1 {
            color: #fff;
            margin: 0 0 20px 0;
            font-size: 2.4em;
            letter-spacing: 3px;
            text-shadow: 0 2px 12px rgba(173, 20, 87, 0.3);
            font-weight: 800;
        }

        .game-container {
            flex: 1;
            width: min(95vw, 95vh * 1.5);
            background: rgba(255, 240, 250, 0.95);
            border-radius: 24px;
            box-shadow: 0 8px 48px rgba(173, 20, 87, 0.2);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(8px);
            border: 4px solid rgba(255, 255, 255, 0.4);
        }

        canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            image-rendering: pixelated;
        }

        .controls {
            position: fixed;
            bottom: 40px;
            right: 40px;
            display: grid;
            grid-template-areas: 
                ". up ."
                "left down right";
            gap: 8px;
            filter: drop-shadow(0 4px 12px rgba(173, 20, 87, 0.2));
        }

        .arrow-btn {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 16px;
            color: #ad1457;
            font-size: 1.8em;
            cursor: pointer;
            transition: all 0.2s;
            display: grid;
            place-items: center;
            backdrop-filter: blur(4px);
        }

        .arrow-btn:hover {
            background: #fff;
            transform: translateY(-2px);
        }

        .arrow-btn:active {
            transform: translateY(0);
            background: rgba(248, 187, 208, 0.9);
        }

        #up { grid-area: up; }
        #down { grid-area: down; }
        #left { grid-area: left; }
        #right { grid-area: right; }

        @media (max-width: 768px) {
            .controls {
                bottom: 20px;
                right: 20px;
            }
            .arrow-btn {
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <div class="game-wrapper">
        <h1>Pixel Library Adventure</h1>
        <div class="game-container">
            <canvas id="game"></canvas>
        </div>
    </div>
    <div class="controls">
        <button class="arrow-btn" id="up">⟰</button>
        <button class="arrow-btn" id="left">⟲</button>
        <button class="arrow-btn" id="down">⟱</button>
        <button class="arrow-btn" id="right">⟳</button>
    </div>

    <script>
    // --- Color Palette ---
    const palette = {
        bg: "#fff0fa",
        shelf: "#b39ddb",
        shelfEdge: "#9575cd",
        book1: "#f8bbd0",
        book2: "#ce93d8",
        book3: "#f06292",
        table: "#ffe0b2",
        tableEdge: "#bcaaa4",
        plantPot: "#a1887f",
        plantLeaf: "#81c784",
        lamp: "#fff59d",
        lampBase: "#ba68c8",
        cat: "#616161",
        girlSkin: "#ffe0e6",
        girlHair: "#ad1457",
        girlDress: "#ba68c8",
        girlShoe: "#7b1fa2",
        eye: "#222"
    };

    // --- Map (10x8) ---
    // 0: empty, 1: shelf, 2: table, 3: plant, 4: lamp, 5: cat
    const map = [
        [1,1,1,1,1,1,1,1,1,1],
        [1,0,0,0,0,0,0,0,0,1],
        [1,0,3,0,0,0,0,4,0,1],
        [1,0,0,0,0,0,0,0,0,1],
        [1,0,0,0,0,0,0,0,0,1],
        [1,0,0,0,0,0,0,0,0,1],
        [1,0,5,0,0,0,0,2,0,1],
        [1,1,1,1,1,1,1,1,1,1]
    ];

    // --- Girl's Position ---
    let girl = { x: 4, y: 4 };

    // --- Drawing Functions ---
    const tile = 32;
    const canvas = document.getElementById('game');
    const ctx = canvas.getContext('2d');

    // Set canvas size based on container
    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;

    function drawShelf(x, y) {
        ctx.fillStyle = palette.shelf;
        ctx.fillRect(x, y, tile, tile);
        ctx.fillStyle = palette.shelfEdge;
        ctx.fillRect(x, y+tile-6, tile, 6);
        // Books
        ctx.fillStyle = palette.book1;
        ctx.fillRect(x+4, y+8, 6, 16);
        ctx.fillStyle = palette.book2;
        ctx.fillRect(x+14, y+10, 6, 14);
        ctx.fillStyle = palette.book3;
        ctx.fillRect(x+24, y+6, 4, 20);
    }
    function drawTable(x, y) {
        ctx.fillStyle = palette.table;
        ctx.fillRect(x+4, y+16, 24, 8);
        ctx.fillStyle = palette.tableEdge;
        ctx.fillRect(x+4, y+24, 24, 4);
        ctx.fillRect(x+6, y+28, 4, 4);
        ctx.fillRect(x+22, y+28, 4, 4);
    }
    function drawPlant(x, y) {
        ctx.fillStyle = palette.plantPot;
        ctx.fillRect(x+12, y+20, 8, 8);
        ctx.fillStyle = palette.plantLeaf;
        ctx.beginPath();
        ctx.arc(x+16, y+18, 10, Math.PI, 2*Math.PI);
        ctx.fill();
    }
    function drawLamp(x, y) {
        ctx.fillStyle = palette.lamp;
        ctx.beginPath();
        ctx.arc(x+16, y+16, 10, Math.PI, 2*Math.PI);
        ctx.fill();
        ctx.fillStyle = palette.lampBase;
        ctx.fillRect(x+14, y+24, 4, 8);
    }
    function drawCat(x, y) {
        ctx.fillStyle = palette.cat;
        ctx.fillRect(x+10, y+22, 12, 8);
        ctx.fillRect(x+12, y+18, 8, 8);
        ctx.beginPath();
        ctx.arc(x+16, y+20, 6, 0, 2*Math.PI);
        ctx.fill();
        // Ears
        ctx.beginPath();
        ctx.moveTo(x+13, y+15); ctx.lineTo(x+15, y+20); ctx.lineTo(x+17, y+15); ctx.fill();
        ctx.beginPath();
        ctx.moveTo(x+19, y+15); ctx.lineTo(x+17, y+20); ctx.lineTo(x+21, y+15); ctx.fill();
        // Eyes
        ctx.fillStyle = "#fff";
        ctx.fillRect(x+14, y+20, 2, 2);
        ctx.fillRect(x+18, y+20, 2, 2);
        ctx.fillStyle = "#222";
        ctx.fillRect(x+15, y+21, 1, 1);
        ctx.fillRect(x+19, y+21, 1, 1);
    }

    function drawGirl(x, y) {
        const size = 32;
        // Base dress
        ctx.fillStyle = '#ba68c8';
        ctx.fillRect(x + 10, y + 16, 12, 14);
        
        // Dress details
        ctx.fillStyle = '#ce93d8';
        ctx.fillRect(x + 11, y + 16, 10, 2);
        ctx.fillRect(x + 12, y + 18, 8, 2);
        
        // Head
        ctx.fillStyle = '#ffe0e6';
        ctx.fillRect(x + 10, y + 8, 12, 12);
        
        // Hair
        ctx.fillStyle = '#ad1457';
        ctx.fillRect(x + 8, y + 6, 16, 6);  // Top
        ctx.fillRect(x + 8, y + 12, 4, 8);  // Left side
        ctx.fillRect(x + 20, y + 12, 4, 8); // Right side
        
        // Face
        ctx.fillStyle = '#222';
        ctx.fillRect(x + 13, y + 14, 2, 2); // Left eye
        ctx.fillRect(x + 17, y + 14, 2, 2); // Right eye
        ctx.fillStyle = '#f8bbd0';
        ctx.fillRect(x + 12, y + 17, 2, 1); // Left blush
        ctx.fillRect(x + 18, y + 17, 2, 1); // Right blush
        
        // Arms
        ctx.fillStyle = '#ffe0e6';
        ctx.fillRect(x + 8, y + 18, 2, 6);  // Left arm
        ctx.fillRect(x + 22, y + 18, 2, 6); // Right arm
        
        // Legs
        ctx.fillStyle = '#ffe0e6';
        ctx.fillRect(x + 12, y + 30, 3, 2); // Left leg
        ctx.fillRect(x + 17, y + 30, 3, 2); // Right leg
        
        // Shoes
        ctx.fillStyle = '#7b1fa2';
        ctx.fillRect(x + 11, y + 32, 4, 2); // Left shoe
        ctx.fillRect(x + 17, y + 32, 4, 2); // Right shoe
    }

    function drawEmbroideryBG() {
        ctx.save();
        ctx.globalAlpha = 0.12;
        for (let y = 0; y < canvas.height; y += 64) {
            for (let x = 0; x < canvas.width; x += 64) {
                ctx.beginPath();
                ctx.arc(x+32, y+32, 28, 0, 2*Math.PI);
                ctx.strokeStyle = "#e1bee7";
                ctx.lineWidth = 2;
                ctx.stroke();
                ctx.beginPath();
                ctx.moveTo(x+12, y+32);
                ctx.quadraticCurveTo(x+32, y+12, x+52, y+32);
                ctx.strokeStyle = "#f8bbd0";
                ctx.stroke();
            }
        }
        ctx.restore();
    }

    function render() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawEmbroideryBG();
        // Draw map
        let tileWidth = canvas.width / 10;
        let tileHeight = canvas.height / 8;
        let tile = Math.min(tileWidth, tileHeight);

        for (let y = 0; y < 8; y++) {
            for (let x = 0; x < 10; x++) {
                let obj = map[y][x];
                let px = x*tile;
                let py = y*tile;
                if (obj === 1) drawShelf(px, py);
                if (obj === 2) drawTable(px, py);
                if (obj === 3) drawPlant(px, py);
                if (obj === 4) drawLamp(px, py);
                if (obj === 5) drawCat(px, py);
            }
        }
        // Draw girl
        drawGirl(girl.x*tile, girl.y*tile);
    }

    function canMove(x, y) {
        if (x < 0 || y < 0 || x > 9 || y > 7) return false;
        if (map[y][x] === 1) return false;
        return true;
    }

    function moveGirl(dx, dy) {
        let nx = girl.x + dx;
        let ny = girl.y + dy;
        if (canMove(nx, ny)) {
            girl.x = nx;
            girl.y = ny;
            render();
        }
    }

    document.addEventListener('keydown', e => {
        if (e.key === "ArrowUp") moveGirl(0, -1);
        if (e.key === "ArrowDown") moveGirl(0, 1);
        if (e.key === "ArrowLeft") moveGirl(-1, 0);
        if (e.key === "ArrowRight") moveGirl(1, 0);
    });
    document.getElementById('up').onclick = () => moveGirl(0, -1);
    document.getElementById('down').onclick = () => moveGirl(0, 1);
    document.getElementById('left').onclick = () => moveGirl(-1, 0);
    document.getElementById('right').onclick = () => moveGirl(1, 0);

    // Add movement animation
    let animationFrame = 0;
    function updateAnimation() {
        animationFrame = (animationFrame + 1) % 4;
        render();
        requestAnimationFrame(updateAnimation);
    }
    updateAnimation();
    </script>
</body>
</html>