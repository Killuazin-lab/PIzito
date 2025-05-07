package com.senac.dispenser.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.senac.dispenser.domain.entity.TarefaCliente;
import com.senac.dispenser.repository.TarefaClienteRepository;

@Service
public class TarefaClienteService {

    private final TarefaClienteRepository tarefaClienteRepository;

    @Autowired
    public TarefaClienteService(TarefaClienteRepository tarefaClienteRepository) {
        this.tarefaClienteRepository = tarefaClienteRepository;
    }

    public List<TarefaCliente> listarTodos() {
        return tarefaClienteRepository.findAll();
    }

    public TarefaCliente salvar(TarefaCliente tarefaCliente) {
        return tarefaClienteRepository.save(tarefaCliente);
    }

    public TarefaCliente buscarPorId(Long id) {
        return tarefaClienteRepository.findById(id).orElse(null);
    }

    public void deletar(Long id) {
        tarefaClienteRepository.deleteById(id);
    }
}

