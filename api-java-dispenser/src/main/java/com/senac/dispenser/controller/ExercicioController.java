package com.senac.dispenser.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.senac.dispenser.domain.entity.Exercicio;
import com.senac.dispenser.service.ExercicioService;

@RestController
@RequestMapping("/api/exercicios")
public class ExercicioController {

    private final ExercicioService exercicioService;

    @Autowired
    public ExercicioController(ExercicioService exercicioService) {
        this.exercicioService = exercicioService;
    }

    @GetMapping
    public ResponseEntity<List<Exercicio>> listarTodos() {
        return ResponseEntity.ok(exercicioService.listarTodos());
    }

    @PostMapping
    public ResponseEntity<Exercicio> criar(@RequestBody Exercicio exercicio) {
        return ResponseEntity.status(HttpStatus.CREATED).body(exercicioService.salvar(exercicio));
    }

    @GetMapping("/{id}")
    public ResponseEntity<Exercicio> buscarPorId(@PathVariable Long id) {
        Exercicio exercicio = exercicioService.buscarPorId(id);
        if (exercicio == null) {
            return ResponseEntity.notFound().build();
        }
        return ResponseEntity.ok(exercicio);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deletar(@PathVariable Long id) {
        exercicioService.deletar(id);
        return ResponseEntity.noContent().build();
    }
}

