<?php
    require 'functions.php';

    if(isset($_POST['submit'])){
        $title = $_POST["title"];
        $summary = $_POST["summary"];
        $text = $_POST["text"];
        $date = $_POST["date"];
        $isJugendEvent = isset($_POST["isJugendEvent"]) ? 1 : 0;
        $abteilungID = isset($_POST["abteilung"]) ? $_POST["abteilung"] : 0;
        $filesToUpload = $_FILES["fileToUpload"];
        
        
        // Validate inputs
        if(empty($title) || empty($summary) || empty($text)){
            $response = "Bitte fülle alle Pflichtfelder aus.";
        }
        // Save article to database
        $result = newArticle($date, $title, $summary, $text, $isJugendEvent, $abteilungID);
        if(!empty($filesToUpload['name'][0])){
            //echo "<br>Hinzufügen von Bildern...";
            //print_r($filesToUpload);
            //echo "<br>";
            $result = addMultipleArticleImages($result, $filesToUpload);
        }
        //echo $result;

        if(is_numeric($result) && $result > 0){
            header("location: adminArticle.php");
            exit;
        }else{
            $response = $result;
        }
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include 'defaultHead.php'; ?>
    <title>Neuer Artikel - WSVL</title>
</head>

<style>
    #markdown-editor-widget {
        max-width: 900px;
        margin: 0 auto;
        color: #1f2937;
        font-family: Arial, sans-serif;
    }

    #markdown-editor-widget *,
    #markdown-editor-widget *::before,
    #markdown-editor-widget *::after {
        box-sizing: border-box;
    }

    #markdown-editor-widget .editor-heading {
        margin: 0 0 8px;
        font-size: 1.5rem;
    }

    #markdown-editor-widget .editor-help {
        margin: 0 0 16px;
        color: #4b5563;
        line-height: 1.5;
    }

    #markdown-editor-widget .editor-toolbar {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        padding: 10px;
        border: 1px solid #d1d5db;
        border-bottom: 0;
        border-radius: 8px 8px 0 0;
        background: #f9fafb;
    }

    #markdown-editor-widget button,
    #markdown-editor-widget select {
        min-height: 38px;
        padding: 7px 10px;
        border: 1px solid #cbd5e1;
        border-radius: 5px;
        background: #fff;
        color: #1f2937;
        font: inherit;
        cursor: pointer;
    }

    #markdown-editor-widget button:hover:not(:disabled),
    #markdown-editor-widget select:hover:not(:disabled) {
        background: #eef2ff;
        border-color: #818cf8;
    }

    #markdown-editor-widget button:focus-visible,
    #markdown-editor-widget select:focus-visible,
    #markdown-editor-widget .editor-canvas:focus-visible {
        outline: 3px solid #a5b4fc;
        outline-offset: 2px;
    }

    #markdown-editor-widget button:disabled,
    #markdown-editor-widget select:disabled {
        cursor: wait;
        opacity: 0.6;
    }

    #markdown-editor-widget .editor-canvas {
        min-height: 320px;
        padding: 20px;
        border: 1px solid #d1d5db;
        border-radius: 0 0 8px 8px;
        background: #fff;
        line-height: 1.65;
        overflow-wrap: anywhere;
        text-align: left;
    }

    #markdown-editor-widget .editor-canvas:empty::before {
        color: #6b7280;
        content: "Start writing here...";
        pointer-events: none;
    }

    #markdown-editor-widget .editor-canvas h1,
    #markdown-editor-widget .editor-canvas h2,
    #markdown-editor-widget .editor-canvas h3 {
        line-height: 1.25;
    }

    #markdown-editor-widget .editor-canvas img {
        max-width: 100%;
        height: auto;
    }

    #markdown-editor-widget .editor-canvas blockquote {
        margin-left: 0;
        padding-left: 16px;
        border-left: 4px solid #6366f1;
        color: #4b5563;
    }

    #markdown-editor-widget .editor-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 12px;
    }

    #markdown-editor-widget .editor-status {
        margin: 0;
        color: #4b5563;
        font-size: 0.95rem;
    }

    #markdown-editor-widget .editor-save {
        min-width: 110px;
        border-color: #4f46e5;
        background: #4f46e5;
        color: #fff;
        font-weight: 700;
    }

    #markdown-editor-widget .editor-save:hover:not(:disabled) {
        background: #4338ca;
        color: #fff;
    }

    @media (max-width: 520px) {
        #markdown-editor-widget .editor-footer {
            align-items: stretch;
            flex-direction: column;
        }
    }

    #markdown-editor-widget .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }
</style>

<body>
    <?php include 'header1.php'; ?>
    <div class="content">
        <?php 
                $filename = getcwd() . $_SERVER['PHP_SELF'];
                $filename = basename($filename, ".php");
                $imageFilename = "documents/pics/introImage/" . $filename . ".png";
                //echo $filename;
            ?>
            <div class="greeting" style="background-image: url(<?php echo $imageFilename ?>);";>
            <div class="greeting" style="background-color: rgba(255, 255, 255, 0.75); height: 100%;">
                <div>
            <h2>Neuer Artikel</h2>
            <p>
                Hier kann man einfach neue Artikel hinzufügen. Füllen Sie dafür das folgende Formular aus.
                <br>
                <br>
                <input type="button" style="background-color: royalblue;" onclick="location.href='adminArticle.php';" value='Zurück' />
            </p>
        </div>
        </div>
        </div>
        <div class="text-field1">
            <h4>Artikel</h4>
            <!--<?php if (!empty($response)) { echo '<div style="color:red;">' . htmlspecialchars($response) . '</div>'; } ?>-->
            <p>
                <ul>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="adminTable">
                            <tr>
                                <td><label>Titel: </label></td>
                                <td><input type="text" placeholder="Titel des Artikels" name="title" id="title" required maxlength="100"></td>
                            </tr>
                            <tr>
                                <td><label>Zusammenfassung: </label></td>
                                <td><textarea placeholder="Inhalt" name="summary" id="summary" required rows="5" cols="60" style="resize: none;" maxlength="255"></textarea></td>
                            </tr>
                            <tr>
                                <td><label>Inhalt: </label></td>
                                <td>
                                    <div id="markdown-editor-widget">
                                        <div class="editor-toolbar" role="toolbar" aria-label="Text formatting">
                                            <label>
                                                <span class="sr-only">Text style</span>
                                                <select data-command="formatBlock" aria-label="Text style" disabled>
                                                    <option value="p">Normaler Text</option>
                                                    <option value="h1">Große Überschrift</option>
                                                    <option value="h2">Mittlere Überschrift</option>
                                                    <option value="h3">Kleine Überschrift</option>
                                                </select>
                                            </label>
                                            <button type="button" data-command="bold" aria-label="Bold" title="Bold" disabled><strong>B</strong></button>
                                            <button type="button" data-command="italic" aria-label="Italic" title="Italic" disabled><em>I</em></button>
                                            <button type="button" data-command="insertUnorderedList" aria-label="Bulleted list" title="Bulleted list" disabled>Stichpunkte</button>
                                            <button type="button" data-command="insertOrderedList" aria-label="Numbered list" title="Numbered list" disabled>Nummerierte Liste</button>
                                            <button type="button" data-action="quote" disabled>"</button>
                                            <button type="button" data-action="link" disabled>Link</button>
                                            <button type="button" data-action="image" disabled>Bild</button>
                                            <button type="button" data-command="undo" aria-label="Undo" title="Undo" disabled>←</button>
                                            <button type="button" data-command="redo" aria-label="Redo" title="Redo" disabled>→</button>
                                        </div>

                                        <div class="editor-canvas"
                                            data-editor
                                            contenteditable="false"
                                            role="textbox"
                                            aria-label="Document text"
                                            aria-multiline="true">
                                        </div>

                                        <p class="editor-status" data-status role="status" aria-live="polite"></p>

                                        <!-- Receives the Markdown version of the editor content on submit -->
                                        <input type="hidden" name="text" id="text">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td><label>Datum: </label></td>
                                <td><input type="date" name="date" id="date"></td>
                            </tr>
                            <tr>
                                <td><label>Jugendevent: </label></td>
                                <td><input type="checkbox" name="isJugendEvent" id="isJugendEvent"></td>
                            </tr>
                            <tr>
                                <td><label>Abteilung: </label></td>
                                <td>
                                    <select name="abteilung" id="abteilung">
                                        <?php
                                            $abteilungen = getAbteilungenWithWebpage();
                                            if($abteilungen == null){
                                                echo "<option value='0'>Keine Abteilung gefunden</option>";
                                                return;
                                            }

                                            echo "<option value='0'>Allgemein</option>";

                                            foreach ($abteilungen as $abteilung) {
                                                echo "<option value='" . $abteilung['abteilungID'] . "'>" . $abteilung['abteilungName'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Bilder: </label></td>
                                <td><input type="file" name="fileToUpload[]" id="fileToUpload" accept="image/jpg, image/jpeg" multiple></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Absenden" name="submit"></td>
                            </tr>
                        </table>
                    </form>
                </ul>
            </p>
        </div>
        <?php include "footer.php"; ?>
    </div>
    <?php include "wavesFooter.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dompurify@3.2.6/dist/purify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/turndown@7.2.0/dist/turndown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/turndown-plugin-gfm@1.0.2/dist/turndown-plugin-gfm.js"></script>
    <script>
        (() => {
            const widget = document.getElementById('markdown-editor-widget');
            if (!widget) {
                return;
            }

            const editor = widget.querySelector('[data-editor]');
            const status = widget.querySelector('[data-status]');
            const form = widget.closest('form');
            const textField = widget.querySelector('#text');
            const controls = widget.querySelectorAll('.editor-toolbar button, .editor-toolbar select');
            let savedRange = null;
            let isDirty = false;

            function setStatus(message, isError) {
                status.textContent = message;
                status.setAttribute('aria-live', isError ? 'assertive' : 'polite');
                status.style.color = isError ? '#b91c1c' : '';
            }

            function enableEditor() {
                editor.contentEditable = 'true';
                controls.forEach((control) => {
                    control.disabled = false;
                });
            }

            function selectionIsInEditor(selection) {
                return selection && selection.rangeCount > 0 &&
                    editor.contains(selection.getRangeAt(0).commonAncestorContainer);
            }

            function restoreSelection() {
                editor.focus();
                if (savedRange) {
                    const selection = window.getSelection();
                    selection.removeAllRanges();
                    selection.addRange(savedRange);
                }
            }

            function safeUrl(url) {
                const value = url.trim();
                return /^(https?:|mailto:|tel:|\/|\.\/|\.\.\/|#)/i.test(value) ? value : '';
            }

            function insertNodeAtSelection(node) {
                restoreSelection();
                const selection = window.getSelection();
                if (!selection || selection.rangeCount === 0) {
                    editor.appendChild(node);
                    return;
                }
                const range = selection.getRangeAt(0);
                range.deleteContents();
                range.insertNode(node);
                range.setStartAfter(node);
                range.collapse(true);
                selection.removeAllRanges();
                selection.addRange(range);
                savedRange = range.cloneRange();
            }

            document.addEventListener('selectionchange', () => {
                const selection = window.getSelection();
                if (selectionIsInEditor(selection)) {
                    savedRange = selection.getRangeAt(0).cloneRange();
                }
            });

            editor.addEventListener('input', () => {
                isDirty = true;
                setStatus('Es gibt ungespeicherte Änderungen.', false);
            });

            widget.querySelectorAll('[data-command], [data-action]').forEach((control) => {
                control.addEventListener('mousedown', (event) => {
                    if (control.tagName !== 'SELECT') {
                        event.preventDefault();
                    }
                });
                control.addEventListener('click', (event) => {
                    const command = control.dataset.command;
                    const action = control.dataset.action;
                    if (command === 'formatBlock') {
                        return;
                    }
                    restoreSelection();
                    if (command) {
                        document.execCommand(command, false);
                    } else if (action === 'quote') {
                        document.execCommand('formatBlock', false, 'blockquote');
                    } else if (action === 'link') {
                        const enteredUrl = window.prompt('Geben Sie die Webadresse des Links ein:');
                        if (enteredUrl === null) {
                            return;
                        }
                        const url = safeUrl(enteredUrl);
                        if (url) {
                            document.execCommand('createLink', false, url);
                        } else {
                            setStatus('Geben Sie eine gültige Linkadresse ein, um einen Link hinzuzufügen.', true);
                            return;
                        }
                    } else if (action === 'image') {
                        const enteredUrl = window.prompt('Geben Sie die Webadresse des Bildes ein:');
                        if (enteredUrl === null) {
                            return;
                        }
                        const url = safeUrl(enteredUrl);
                        if (!url) {
                            setStatus('Geben Sie eine gültige Bildadresse ein, um ein Bild hinzuzufügen.', true);
                            return;
                        }
                        const enteredAlt = window.prompt('Beschreiben Sie das Bild für Personen, die es nicht sehen können:');
                        if (enteredAlt === null) {
                            return;
                        }
                        const image = document.createElement('img');
                        image.src = url;
                        image.alt = enteredAlt;
                        insertNodeAtSelection(image);
                    }
                    editor.dispatchEvent(new Event('input', { bubbles: true }));
                });
            });

            widget.querySelector('[data-command="formatBlock"]').addEventListener('change', (event) => {
                restoreSelection();
                document.execCommand('formatBlock', false, event.currentTarget.value);
                editor.dispatchEvent(new Event('input', { bubbles: true }));
            });

            // Convert the editor content to Markdown and put it into the hidden
            // "text" field so it is submitted together with the rest of the form.
            form.addEventListener('submit', (event) => {
                if (!window.TurndownService || !window.turndownPluginGfm) {
                    event.preventDefault();
                    setStatus('Der Editor konnte den Text nicht für das Speichern vorbereiten. Bitte aktualisieren Sie die Seite.', true);
                    return;
                }

                const converter = new TurndownService({
                    codeBlockStyle: 'fenced',
                    headingStyle: 'atx'
                });
                converter.use(turndownPluginGfm.gfm);
                const markdown = converter.turndown(editor.innerHTML).trim();

                if (markdown === '') {
                    event.preventDefault();
                    setStatus('Bitte geben Sie einen Inhalt für den Artikel ein.', true);
                    editor.focus();
                    return;
                }

                textField.value = markdown;
                isDirty = false;
            });

            window.addEventListener('beforeunload', (event) => {
                if (isDirty) {
                    event.preventDefault();
                    event.returnValue = '';
                }
            });

            enableEditor();
        })();
        </script>


</body>

</html>