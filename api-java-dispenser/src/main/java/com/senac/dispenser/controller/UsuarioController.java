package com.senac.dispenser.controller;

import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/usuarios")
public class UsuarioController {

    @GetMapping
    public String listarUsuarios() {
        return "DEU BOM";
    }
}
