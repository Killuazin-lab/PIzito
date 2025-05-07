package com.senac.dispenser.service;

import java.time.LocalDate;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.senac.dispenser.domain.entity.Pedido;
import com.senac.dispenser.repository.PedidoRepository;

@Service
public class PedidoService {

    private final PedidoRepository pedidoRepository;

    @Autowired
    public PedidoService(PedidoRepository pedidoRepository) {
        this.pedidoRepository = pedidoRepository;
    }

    public List<Pedido> listarTodos() {
        return pedidoRepository.findAll();
    }

    public Pedido salvar(Pedido pedido) {
    	if(pedido.getDataEmissao() == null) {
    		pedido.setDataEmissao(LocalDate.now());
    	}
        return pedidoRepository.save(pedido);
    }

    public Pedido buscarPorId(Long id) {
        return pedidoRepository.findById(id).orElse(null);
    }

    public void deletar(Long id) {
        pedidoRepository.deleteById(id);
    }
}

