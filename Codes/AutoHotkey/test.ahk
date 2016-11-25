#NoEnv  ; Recommended for performance and compatibility with future AutoHotkey releases.
; #Warn  ; Enable warnings to assist with detecting common errors.
SendMode Input  ; Recommended for new scripts due to its superior speed and reliability.
SetWorkingDir %A_ScriptDir%  ; Ensures a consistent starting directory.

^j::
    MsgBox Wow!
    MsgBox this is
    Run, Notepad.exe
    winactivate, Untitled - Notepad
    WinWaitActive, Untitled - Notepad
    send, 7 lines{!}{enter}
    sendinput, inside the ctrl{+}j hotkey
    Send, My First Script
Return

::test::This is Test

::btw::
    MsgBox You typed "btw"
Return
