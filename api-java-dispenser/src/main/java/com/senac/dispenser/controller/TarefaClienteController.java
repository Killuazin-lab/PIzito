package com.senac.dispenser.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.senac.dispenser.domain.entity.TarefaCliente;
import com.senac.dispenser.service.TarefaClienteService;

@RestController
@RequestMapping("/api/tarefas-clientes")
public class TarefaClienteController {

    private final TarefaClienteService tarefaClienteService;

    @Autowired
    public TarefaClienteController(TarefaClienteService tarefaClienteService) {
        this.tarefaClienteService = tarefaClienteService;
    }

    @GetMapping
    public ResponseEntity<List<TarefaCliente>> listarTodos() {
        return ResponseEntity.ok(tarefaClienteService.listarTodos());
    }

    @PostMapping
    public ResponseEntity<TarefaCliente> criar(@RequestBody TarefaCliente tarefaCliente) {
        return ResponseEntity.status(201).body(tarefaClienteService.salvar(tarefaCliente));
    }

    @GetMapping("/{id}")
    public ResponseEntity<TarefaCliente> buscarPorId(@PathVariable Long id) {
        TarefaCliente tarefaCliente = tarefaClienteService.buscarPorId(id);
        if (tarefaCliente == null) {
            return ResponseEntity.notFound().build();
        }
        return ResponseEntity.ok(tarefaCliente);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deletar(@PathVariable Long id) {
        tarefaClienteService.deletar(id);
        return ResponseEntity.noContent().build();
    }
}

